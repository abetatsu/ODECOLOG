<div class="dropdown">
     <div class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="https://res.cloudinary.com/tatsu/image/upload/v1601111215/options-horizontal_i4cub7.svg">
     </div>
     <div class="dropdown-menu dropdown-menu-bg" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item text-muted btn btn-link post-show-edit" href="{{ route($editRoute, $id) }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601172995/edit_g4swwu.svg">EDIT</a>
          <label for="user-delete{{ $id }}">
               <form class="dropdown-item text-muted" action="{{ route($deleteRoute, $id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <img src="https://res.cloudinary.com/tatsu/image/upload/v1601172993/delete_b1rjwi.svg"><input id="user-delete{{ $id }}" class="btn btn-link" type="submit" value="DELETE" onclick='return confirm("削除しますか？");'>
               </form>
          </label>
     </div>
</div>
