<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Order;
use Illuminate\Http\Request;
use PDF;
use Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.contact.index');
    }


    public function pdf(Request $request)
    {
        $data["email"] = $request->user;
        $data["title"] = "From Task.com";
        $data["body"] = "Orders ";
        $data["orders"] = Order::get();
        $data["orders"] = Order::get();
        $pdf = PDF::loadView('emails.myTestMail', $data);
        Mail::send('emails.myTestMail', $data, function($message)use($data, $pdf) {
                $message->to($data["email"])
                ->subject($data["title"])
                ->attachData($pdf->output(), "text.pdf");
            });
        $pdf->save(storage_path().'_filename.pdf');
        // Finally, you can download the file using download function
        return $pdf->download('text.pdf');
  
    }

    public function modify(ContactRequest $request)
    {
        Contact::upsertInstance($request);
        return redirect()->route('contact');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
}
