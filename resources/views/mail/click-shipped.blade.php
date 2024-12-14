<x-mail::message>
# stata prosm stat
prosmotor stat {{$article_count}}<br>
comment {{$comment_count}}

Your order has been shipped!


Thanks,<br>
{{ config('app.name') }}
</x-mail::message>