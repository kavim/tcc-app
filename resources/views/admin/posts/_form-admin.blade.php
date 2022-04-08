
<strong>
    Visibility Control
</strong>
<hr>

<div class="custom-control custom-checkbox">
    <input name="active" type="checkbox" class="custom-control-input" id="customCheck2"
    @if(isset($post->active))
        {{ old('active') == 'on' || $post->active == 1 ? 'checked' : '' }}
    @else
        {{ old('active') == 'on' ? 'checked' : '' }}
    @endif>
    <label class="custom-control-label" for="customCheck2">active</label>
</div>
<br>
