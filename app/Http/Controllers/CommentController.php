<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Tweet;
use App\Models\User;
use Auth;
use App\Models\Comment;


class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {      
        
        $comments = Comment::getAllOrderByUpdated_at();
        //ddd($comments);
        return view('comment.index',compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Tweet $tweet)
    {   

        return view('comment.create',compact('tweet'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
    $validator = Validator::make($request->all(), [
    'comment' => 'required | max:191',
  ]);

  

  
  // バリデーション:エラー
  if ($validator->fails()) {
    return redirect()
      ->route('comment.create')
      ->withInput()
      ->withErrors($validator);
  }
  // create()は最初から用意されている関数
  // 戻り値は挿入されたレコードの情報
  
    $data = $request->merge(['user_id' => Auth::user()->id, 'tweet_id' => $id])->all();
    
    $tweets = Tweet::find($id);
    $result = Comment::create($data);
    $comments = $result;
    //ddd($comments);
    
  // ルーティング「todo.index」にリクエスト送信（一覧ページに移動）
    //$comments = Comment::getAllOrderByUpdated_at();
    //ddd($comments);
    //return view('tweet.show', compact('tweets'));

    return redirect()->route('comment.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function list($id)
    {

      $tweet = Tweet::find($id)->tweet;
    
      $lists = Tweet::query()
      ->find($id)
      ->comments()
      ->orderBy('created_at','desc')
      ->get();
    
    //$lists = Comment::getCommentList($id);
        
    return view('comment.list',compact('lists', 'tweet'));
    }

}
