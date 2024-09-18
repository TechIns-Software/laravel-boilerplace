<table class="col-12 table table-striped">
    <thead>
    <tr>
        <th>{{ __('table_headers.username') }}</th>
        <th>{{ __('table_headers.email') }}</th>
        <th>{{ __('table_headers.role') }}</th>
        <th>{{ __('table_headers.actions') }}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users->items() as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{__("user.".$user->role)}}</td>
            <td class="submitContainer">
                <a href="{{ route('user.edit.view',['user_id'=>$user->id]) }}" >{{__('user.edit')}}</a>
            </td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <td colspan="4">
            <nav aria-label="Users Navigation">
                <ul class="pagination  justify-content-center">
                    <li class="page-item @empty($users->previousPageUrl()) disabled @endif">
                        <a class="page-link" href="{{$users->previousPageUrl()}}" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    @for($i=1;$i<=$users->lastPage();$i++)
                        <li class="page-item"><a class="page-link" href="{{$users->url($i)}}">{{$i}}</a></li>
                    @endfor

                    <li class="page-item">
                        <a class="page-link" href="{{$users->nextPageUrl()}}" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </td>
    </tr>

    </tfoot>
</table>
