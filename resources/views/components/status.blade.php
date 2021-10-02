@if ($item->status==1)
    bg-success
@elseif ($item->status ==2)
    bg-warning
@else
    bg-danger
@endif
