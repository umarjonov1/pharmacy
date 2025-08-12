@extends('layouts.admin')
@push('styles')
    <style>
        /* показываем, что заголовки кликабельны */
        #example1 thead th:not([data-sort-method="none"]) {
            cursor: pointer;
            position: relative;
            user-select: none;
            padding-right: 18px;
        }
        /* стрелка по умолчанию (даже до клика) */
        #example1 thead th:not([data-sort-method="none"])::after {
            content: "⇅";
            position: absolute; right: 8px; top: 50%;
            transform: translateY(-52%); font-size: 12px; opacity: .35;
        }
        /* по возрастанию ↑ */
        #example1 thead th.sort-up::after {
            content: "▲"; opacity: .8;
        }
        /* по убыванию ↓ */
        #example1 thead th.sort-down::after {
            content: "▼"; opacity: .8;
        }
        /* подсветка активного столбца */
        #example1 thead th.sort-up,
        #example1 thead th.sort-down { color: #0d6efd; }
        #example1 td.active-col, #example1 th.active-col { background: #f7faff; }
    </style>
@endpush
@section('header')
    <h1>
        Blank page
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
            <div class="form-group">
                <a href="{{ route('admin.user.create') }}" class="btn btn-success">Добавить</a>
            </div>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th data-sort-method="number">ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th data-sort-method="none">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>
                            <a href="{{ route('admin.user.show', $user->id) }}">{{ $user->name }}</a>
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->roleTitle }}</td>
                        <td>
                            <a href="{{ route('admin.user.edit', $user->id) }}" class="fa fa-pencil"></a>
                            <form action="{{ route('admin.user.delete', $user->id) }}" method="post" style="display:inline">
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
