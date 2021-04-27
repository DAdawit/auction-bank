<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class BankController extends Controller
{

    public function index()
    {
        $users=User::all();
        return $users;
    }

    public function deposit(Request $request){
        $user=User::find($request->bookNumber);
        $user->balance=$user->balance+$request->amount;;
        $user->update();
        return $user;
    }
    public function withdrow(Request $request){

        $user=User::find($request->book_number);

        $eAcutionBookNumber=User::find(10000);
        if($user){
            if(Hash::check($request['password'],$user->password)){
                if($user->balance < $request->booking_price){
                    return response()->json(['error' => 'You have insufficient balance on your bank Account !'], 401);
                }else{
                    $user->balance=$user->balance - $request->booking_price;
                    $user->update();
                    $eAcutionBookNumber->balance=$eAcutionBookNumber->balance + $request->booking_price;
                    $eAcutionBookNumber->update();
                    return response()->json(['success' => 'paid for booking'], 200);

                }
            }else{
                return response()->json(['error' => 'incorrect password'], 401);
            }
        }else{
            return response()->json(['error' => 'user not found'], 401);
        }

    }

    public function returnBiddersMoney(Request $request){
//        return $request;
        $eauctionNumber=User::find(10000);

        for($x=0;$x<count($request->bookNumbers);$x++){
            $eauctionNumber->balance=$eauctionNumber->balance - $request->amount;
            $eauctionNumber->update();
            $bidder=User::find($request->bookNumbers[$x]);
            $bidder->balance=$bidder->balance + $request->amount;
            $bidder->update();
        }
    }

    public function checkOut(Request $request){
            $seller=User::find($request->seller_book_number);
            $buyer=User::find($request->buyer_book_number);
            $eAcutionBookNumber=User::find(10000);


        if($buyer){
            if($seller){
                if(Hash::check($request['password'],$buyer->password)){
                    if($buyer->balance < $request->totalPayement){
                        return response()->json(['error' => 'You have insufficient balance on your bank Account !'], 401);
                    }else{
                        $buyer->balance=$buyer->balance - $request->winning_price;
                        $buyer->update();
                        $seller->balance=$seller->balance + $request->winning_price;
                        $seller->update();

//                        $buyer->balance=$buyer->balance-$request->commesion;
//                        $buyer->update();
//                        $eAcutionBookNumber->balance=$eAcutionBookNumber->balance+$request->commesion;
//                        $eAcutionBookNumber->update();

                        return response()->json(['success' => 'success'], 200);
                    }
                }else{
                    return response()->json(['error' => 'incorrect password'], 401);
                }
            }else{
                return response()->json(['error' => 'seller not found'], 401);
            }
        }else{
            return response()->json(['error' => 'buyer user not found'], 401);
        }
    }

    public function returnMoneyFromOrg($request){

    }


}
