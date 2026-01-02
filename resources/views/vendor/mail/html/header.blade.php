@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'SiFunding')
<img src="https://upload.wikimedia.org/wikipedia/commons/a/a0/Bank_Syariah_Indonesia.svg" class="h-16 w-auto drop-shadow-sm" alt="Logo BSI" />
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
