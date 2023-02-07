@extends('emails.master')
@section('mailtitle')
Thanks !
@endsection
@section('content')
<tr class="" style="background-color: #ffffff;">
    <td class="p-5">
        {{-- <p style="font-size:30px; margin: 5px;text-align:center">{{ $newsletter['title'] }}</p> --}}
        <p class="font-raleway leading-6">
            Dear {{$donation->donar_firstname}}, <br />
            {{$msg}}

            Best regards,
            The Dinghy Foundation Team
        </p>
        {{-- <hr style="border: 1px solid #cecece5e;margin-top: 52px;"> --}}
        <center class="my-12">
            <a href="http://www.dinghyfdn.org" style="color: #fff; text-decoration: none;" target="_blank">
                <button
                    class="inline-flex items-center sm:px-5 sm:py-4 bg-eve font-bold text-sm text-white font-raleway uppercase tracking-widest hover:bg-white border border-eve hover:border hover:border-eve hover:text-eve  justify-center"
                    type="submit">
                    Visit Site
                </button>
            </a>
        </center>
    </td>
</tr>
@endsection






