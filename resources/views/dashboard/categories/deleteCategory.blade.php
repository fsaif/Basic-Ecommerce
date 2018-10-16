@extends('dashboard.layouts.dashboard')

@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Delete Category Confirmation</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
                <table class="table table-striped">
                    <tbody>
                    <tr>
                        <td>English Name</td>
                        <td>{{ $cat->name_en }}</td>
                    </tr>
                    <tr>
                        <td>Arabic Name</td>
                        <td>{{ $cat->name_ar }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <div class="box-footer">
            <a class="btn btn-default" href="{{ route('dashboard') }}">Cancel</a>
            <form action="{{ route('categories.destroy', $cat->id) }}" method="POST"
                  style="display: inline-block" class="pull-right">
                @csrf
                @method('DELETE')
                <input type="submit" class="btn btn-danger" value="Confirm"/>
            </form>
        </div>

@endsection