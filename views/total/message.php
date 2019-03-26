<? if($this->message->text): ?>
    <div class="message-wrp">
        <p class="message <?=$this->message->class?>"><?=$this->message->text?></p>
    </div>
<? endif; ?>
