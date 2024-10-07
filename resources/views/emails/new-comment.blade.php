<x-mail::message>
# New Comment

Dear Admin <br>

You have a new comment on your blog, please check it <br>
<a href="{{ env('APP_URL') }}/dashboard/comments" style="text-decoration: none; color:red;">Click here to quickly access the submitted comment</a>


Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
