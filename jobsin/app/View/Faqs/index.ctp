<h4>FAQ</h4>
<script type='text/javascript'>
    var answer = null;
    function showAnswer(obj) {
        if (answer) {
            answer.style.display = 'none';
        }
        answer = document.getElementById('div' + obj.value)
        if (answer) {
            answer.style.display = 'block';
        }
    }
</script>
<select onchange='showAnswer(this);'>
    <option value=''> Please select ... </option>
    <?php foreach ($faqs as $key => $faq) { ?>
    <option value='<?=$key?>'> <?=$faq['Faq']['question'];?> </option>
    <?php } ?>
</select>
<?php foreach ($faqs as $key => $faq) { ?>
<div id='div<?=$key?>' style='display:none;'> <?=$faq['Faq']['answer'];?> </div>
<?php } ?>
<script>