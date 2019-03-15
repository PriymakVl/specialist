<?php
    $message = new Message();
    $message->get();
 ?>

<? if($message->text): ?>
    <div class="message-wrp">
        <p class="message <?=$message->class?>"><?=$message->text?></p>
    </div>
<? endif; ?>
