@extends('layouts.admin')

@section('header')
    <h1>
        Comments
        <small>it all starts here</small>
    </h1>
@endsection

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Листинг сущности</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th data-sort-method="number">ID</th>
                    <th>User name</th>
                    <th>Comment</th>
                    <th>Medicine name</th>
                    <th>Created at</th>
                    <th data-sort-method="none">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($comments as $comment)
                    <tr>
                        <td>{{ $comment->id }}</td>
                        <td>
                            {{ $comment->user->name }}
                        </td>
                        <td>{{ $comment->comment }}</td>
                        <td>{{ $comment->medicine->title }}</td>
                        <td>{{ $comment->created_at }}</td>
                        <td>
                            <form action="{{ route('comment.delete', $comment->id) }}"
                                  method="post"
                                  style="display:inline"
                                  onsubmit="return confirm('Do you really want delete?');">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger fa fa-remove"></button>
                            </form>

                        </td> <!-- ← ВАЖНО: закрываем ячейку -->
                    </tr> <!-- ← ВАЖНО: закрываем строку -->
                @endforeach
                </tbody> <!-- ← ВАЖНО: закрываем tbody -->
            </table>

        </div>
        <!-- /.box-body -->
    </div>


{{--    sort table--}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const table = document.getElementById('example1');
            if (!table) return;

            new Tablesort(table);

            table.addEventListener('afterSort', function () {
                // убрать старую подсветку
                table.querySelectorAll('th, td').forEach(el => el.classList.remove('active-col'));

                // найти активный th
                const th = table.querySelector('thead th.sort-up, thead th.sort-down');
                if (!th) return;

                const index = Array.prototype.indexOf.call(th.parentNode.children, th);

                // подсветить th и все td этого столбца
                th.classList.add('active-col');
                table.querySelectorAll('tbody tr').forEach(tr => {
                    const cell = tr.children[index];
                    if (cell) cell.classList.add('active-col');
                });
            });
        });
    </script>
@endsection
