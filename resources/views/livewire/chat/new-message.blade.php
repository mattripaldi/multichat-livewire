<div x-data="formScope()">
    <form wire:submit.prevent="send">
        <div class="form-group">
            <textarea rows="3" class="form-control" wire:model="body" x-on:keydown.enter="submit"></textarea>

            <button type="submit" class="btn btn-secondary btn-block" x-ref="submit">Send</button>
        </div>
    </form>
</div>

<script>
    function formScope() {
        return {
            submit(e) {
                if(e.shiftKey) return

                this.$refs.submit.click()
            }
        }
    }
</script>
