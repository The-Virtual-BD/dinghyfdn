@extends('emails.master')
@section('mailtitle')
Welcome !
@endsection
@section('content')
<tr class="" style="background-color: #ffffff;">
    <td class="p-5">
        {{-- <p style="font-size:30px; margin: 5px;text-align:center">{{ $newsletter['title'] }}</p> --}}
        <p class="font-raleway leading-6">
            Dear Applicant, <br />

            Thank you for your interest in Dinghy Foundation and for taking the time to submit your application for the [Job Position]. We appreciate the opportunity to review your qualifications and experience.

            Your application will be thoroughly reviewed by our HR team, and if we believe you are a good fit for the position, we will be in touch soon to schedule an interview. In the meantime, if you have any additional questions or would like to provide additional information, please do not hesitate to reach out.

            Thank you again for considering Dinghy Foundation as your next career opportunity.

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

