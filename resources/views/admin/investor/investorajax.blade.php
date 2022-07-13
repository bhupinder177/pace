<table class="table table-bordered">
    <thead>
        <tr>
            <th style="width: 5%">S. No</th>
            <th style="width: 10%">Name</th>
            <th style="width: 10%">Designation</th>
            <th style="width: 8%">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if(count($investorData) != 0) {
            ?>
            @foreach($investorData as $u)
                <tr class="data">
                    <td>{{ ++$srNo }}</td>
                    <td>{{ $u->name }}</td>
                    <td>{{ $u->designation }}</td>
                    <td>
                        <a href="{{route('investor.edit', ['id' => Crypt::encrypt($u->id)])}}"><i class="fa fa-edit"></i></a>
                        <a class="deleterecord" data-link="{{route('investor.delete')}}" data-id="{{$u->id}}"><i class="fa fa-trash deleterecord"  data-link="{{route('investor.delete')}}"  data-id="{{$u->id}}" aria-hidden="true"></i></a>
                    </td>
                </tr>
            @endforeach
            <?php
        } else {
            ?>
                <tr><td colspan="4"><center>No Record Found</center></td></tr>
            <?php
        } ?>
    </tbody>
</table>
<div class="pagination1">
    {{$investorData->links()}}
</div>
