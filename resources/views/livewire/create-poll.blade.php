<div>
    <form wire:submit='createPoll'>
        <label>Poll Title</label>
        <input type="text" wire:model.live="title"/>
        @error('title') <span class="error">{{ $message }}</span> @enderror
        <div class="mb-4 mt-4">
            <button class="btn" wire:click.prevent='addOption'>Add option</button>
        </div>
        <div class="mt-4">
            @foreach ($options as $index =>$option)
                <div class="mb-4">
                    <label for="">Option {{1+$index}}</label>
                </div>
                <div class="flex gap-2">
                    <input type="text" wire:model='options.{{$index}}'>
                    <button class="btn" wire:click.prevent='removeOptions({{$index}})'>Remove</button>
                </div>

                @error('options.'.$index) <span class="error ">{{ $message }}</span> @enderror
            @endforeach
        </div>
        <button type="submit" class="btn" >Create Poll</button>
    </form>
</div>
