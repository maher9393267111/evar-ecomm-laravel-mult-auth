<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;

class IndexController extends Controller
{
    public function home()
    {
        $banners = Banner::where(['status' => 'active', 'condition' => 'banner'])->orderBy('id', 'DESC')->limit('5')->get();
        $categories = Category::where(['status' => 'active', 'is_parent' => 1])->limit(3)->orderBy('id', 'DESC')->get();
        return view('frontend.index', compact(['banners', 'categories']));
    }
    public function shop(Request $request)
    {
        $products=Product::query();
        if(!empty($_GET['category'])){
            $slug=explode(',',$_GET['category']);
            $cat_id=Category::select('id')->whereIn('slug',$slug)->pluck('id')->toArray();
            $products=$products->whereIn('cat_id',$cat_id)->paginate(12);
        }
        else{
            $products = Product::where('status', 'active')->paginate(12);
        }
      
        $category = Category::where(['status' => 'active', 'is_parent' => 1])->with('products')->orderBy('title', 'ASC')->get();
        return view('frontend.pages.product.shop', compact('products', 'category'));
    }
    public function shopFilter(Request $request)
    {
        $data = $request->all();
        $catUrl = '';
        if (!empty($data['category'])) {
            foreach ($data['category'] as $category) {
                if (empty($catUrl)) {
                    $catUrl .= '&category='.$category;
                } else {
                    $catUrl .= ','.$category;
                }
                            
            }
            return \redirect()->route('shop',$catUrl);
        }
    }


    public function productCategory(Request $request, $slug)
    {
        $categories = Category::with('products')->where('slug', $slug)->first();
        $sort = '';
        if ($request->sort != null) {
            $sort = $request->sort;
        }
        if ($categories == null) {
            return view('errors.404');
        } else {
            if ($sort == 'priceAsc') {
                $products = Product::where(['status' => 'active', 'cat_id' => $categories->id])->orderBy('offer_price', 'ASC')->paginate(12);
            } else if ($sort == 'priceDesc') {
                $products = Product::where(['status' => 'active', 'cat_id' => $categories->id])->orderBy('offer_price', 'DESC')->paginate(12);
            } else if ($sort == 'discAsc') {
                $products = Product::where(['status' => 'active', 'cat_id' => $categories->id])->orderBy('price', 'ASC')->paginate(12);
            } else if ($sort == 'discDesc') {
                $products = Product::where(['status' => 'active', 'cat_id' => $categories->id])->orderBy('price', 'DESC')->paginate(12);
            } else if ($sort == 'titleAsc') {
                $products = Product::where(['status' => 'active', 'cat_id' => $categories->id])->orderBy('title', 'ASC')->paginate(12);
            } else if ($sort == 'titleDesc') {
                $products = Product::where(['status' => 'active', 'cat_id' => $categories->id])->orderBy('title', 'DeSC')->paginate(12);
            } else {
                $products = Product::where(['status' => 'active', 'cat_id' => $categories->id])->paginate(12);
            }
        }
        $route = 'product-category';
        if ($request->ajax()) {
            return view('frontend.layouts.singleproduct', compact(['products']))->render();
        }
        return view('frontend.pages.product.product_category', compact(['categories', 'route', 'products']));
    }
    public function productDetail($slug)
    {
        $product = Product::with('rel_product')->where('slug', $slug)->first();
        if ($product) {
            return view('frontend.pages.product.product_detail', compact(['product']));
        } else {
            return "Product Not Found";
        }
    }
    public function userAuth()
    {
        Session()->put('url.intended', URL::previous());
        return view('frontend.auth.user-auth');
    }
    public function loginSubmit(Request $request)
    {
        $this->validate($request, [
            'email' => 'email|required|exists:users,email',
            'password' => 'required',
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => 'active'])) {
            Session()->put('user', $request->email);
            if (Session()->get('url.intended')) {
                return redirect()->to(Session()->get('url.intended'));
            } else {
                return redirect()->route('front')->with('success', 'Successfully Login');
            }
        } else {
            return back()->with('error', 'Invalid Email or Password Try Again!');
        }
    }
    public function registerSubmit(Request $request)
    {
        $this->validate($request, [
            'fullname' => 'required|string',
            'username' => 'nullable|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'min:4|required|confirmed',
        ]);
        $data = $request->all();
        $check = $this->savedata($data);
        Session()->put('user', $data['email']);
        Auth::login($check);
        if ($check) {
            return redirect()->route('front')->with('success', 'Successfully Registered');
        } else {
            return back()->with('error', ['Kindly ChecK Your Creditinals']);
        }
    }
    public function savedata($data)
    {
        return User::create([
            'fullname' => $data['fullname'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
    public function userLogout(Request $request)
    {
        // Session::forget('user');
        $request->session()->forget('user');
        Auth::logout();
        return redirect()->route('front')->with('sucsess', 'Successfully Logout');
    }
    public function userDashboard()
    {
        $user = Auth::user();
        return view('frontend.user.dashboard', compact(['user']));
    }
    public function userOrder()
    {

        $user = Auth::user();
        return view('frontend.user.order', compact(['user']));
    }
    public function userTrack()
    {
        $user = Auth::user();
        return view('frontend.user.track', compact(['user']));
    }
    public function userAddress()
    {

        $user = Auth::user();
        return view('frontend.user.address', compact(['user']));
    }
    public function userAccount()
    {

        $user = Auth::user();
        return view('frontend.user.detail', compact(['user']));
    }
    public function billingAdddress(Request $request, $id)
    {
        $user = User::where('id', $id)->update(['city' => $request->city, 'postcode' => $request->postcode, 'state' => $request->state, 'address' => $request->address]);
        if ($user) {
            return back()->with('success', 'Successfully Address Updated');
        } else {
            return back()->with('error', 'Something Wrong');
        }
    }
    public function shippingAdddress(Request $request, $id)
    {
        $user = User::where('id', $id)->update(['scity' => $request->scity, 'spostcode' => $request->spostcode, 'sstate' => $request->sstate, 'saddress' => $request->saddress]);
        if ($user) {
            return back()->with('success', 'Successfully Shipping Address Updated');
        } else {
            return back()->with('error', 'Something Wrong');
        }
    }
    public function updateAccount(Request $request, $id)
    {
        $this->validate($request, [
            'newpassword' => 'password|min:4',
            'fullname' => 'required|string',
            'username' => 'nullable|string',
            'phone' => 'nullable|min:11',
        ]);
        $hashpassword = Auth::user()->password;
        if ($request->oldpassword == null && $request->newpassword == null) {
            User::where('id', $id)->update(['fullname' => $request->fullname, 'username' => $request->username, 'phone' => $request->phone]);
            return back()->with('success', 'Successfully Updated Account');
        } else {
            if (Hash::check($request->oldpassword, $hashpassword)) {
                if (!Hash::check($request->newpassword, $hashpassword)) {
                    User::where('id', $id)->update(['fullname' => $request->fullname, 'username' => $request->username, 'phone' => $request->phone, 'password' => Hash::make($request->newpassword)]);
                    return back()->with('success', 'Successfully Updated Account');
                } else {
                    return back()->with('error', 'New Password can not be same with old password');
                }
            } else {
                return back()->with('error', 'Old Password not match');
            }
        }
    }
}
