<!-- Formulář pro úpravu transakce -->
<form method="POST" id="edit_form">
    <?php 



?>
    <div class="crud_wrapper hidden" id="edit_wrapper">
        <label for="edit_transaction_name">Název transakce *</label>
        <input type="text" id="edit_transaction_name" name="edit_transaction_name" required>

        <label for="edit_transaction_description">Popis transakce</label>
        <input type="text" id="edit_transaction_description" name="edit_transaction_description" maxlength="300">

        <label for="edit_value">Částka *</label>
        <input type="number" id="edit_value" name="edit_value" min="1">

        <label for="edit_transaction_category">Kategorie</label>
        <select id="edit_transaction_category" name="edit_transaction_category">
            <option value="ostatni">Ostatní</option>
            <option value="doprava">Doprava</option>
            <option value="jidlo">Strava</option>
            <option value="zabava">Zábava</option>
            <option value="najem">Bydlení</option>
            <option value="prijem">Příjem</option>
            <option value="sporeni">Spoření</option>
        </select>

        <label for="edit_transaction_date">Datum transakce *</label>
        <input type="date" id="edit_transaction_date" name="edit_transaction_date" required>

        <button type="button" class="edit_button_form">
            <i class="fa-regular fa-square-plus"></i> Upravit
        </button>
    </div>
</form>