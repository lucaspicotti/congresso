<div class="d-flex flex-column justify-content-center align-items-center">
    <div class="formulario row border rounded p-3 shadow-sm ms-10">
        <?php foreach($dados as $dado): ?>
        <ul class="list-group">
            <li class="list-group-item"><?php echo $dado['paragrafo']?></li><br>
        </ul>
        <?php endforeach; ?>
    </div>
</div>