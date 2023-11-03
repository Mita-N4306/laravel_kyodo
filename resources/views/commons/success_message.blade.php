@if(session('message'))
<div class="message-container" style="text-align:center; padding:8px; border:solid 2px green; background-color:lightgreen">
 {{session('message')}}
</div>
@endif
