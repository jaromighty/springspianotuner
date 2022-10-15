@component('mail::message')
# Tuning Confirmation

Your tuning has been scheduled for {{ \Carbon\Carbon::parse($tuning->scheduled_at)->format('F jS, Y \a\t g:i A') }}. 
If you need to reschedule, please contact us at [tunings@springspianotuner.com](mailto:tunings@springspianotuner).

Thanks,<br>
{{ config('app.name') }}
@endcomponent
