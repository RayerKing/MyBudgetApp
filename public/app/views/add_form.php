<!-- Formulář pro přidání transakce -->
<form method="POST" id="add_form">
    <div class="add_wrapper hidden">
        <label for="transaction_name">Název transakce *</label>
        <input type="text" id="transaction_name" name="transaction_name" required>

        <label for="transaction_description">Popis transakce</label>
        <input type="text" id="transaction_description" name="transaction_description" maxlength="300">

        <label for="value">Částka *</label>
        <input type="number" id="value" name="value" min="1">

        <label for="transaction_category">Kategorie</label>
        <select id="transaction_category" name="transaction_category">
            <option value="ostatni">Ostatní</option>
            <option value="doprava">Doprava</option>
            <option value="jidlo">Strava</option>
            <option value="zabava">Zábava</option>
            <option value="najem">Bydlení</option>
            <option value="prijem">Příjem</option>
            <option value="spoření">Spoření</option>
        </select>

        <label for="transaction_date">Datum transakce *</label>
        <input type="date" id="transaction_date" name="transaction_date" required>

        <button type="button" class="add_button_form">
            <i class="fa-regular fa-square-plus"></i> Přidat
        </button>
    </div>
</form>