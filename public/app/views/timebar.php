<!-- HTML STRUKTURA PRO VYKRESLENÍ TIMEBARU -->

<form method="GET" class="timebar" id="timebar">

  <fieldset class="timebar__fieldset">

    <!-- nadpis -->
    <div class="timebar__title">
      <h2>Období</h2>
    </div>

    <div class="timebar__content">
      <!-- šipka pro předchozí měsíc -->
      <div class="timebar__month">
        <div class="timebar__arrow">
          <button type="button" value="prevMonth" name="step" class="btn btn-nav" id="prev-month">
            <i class="fa-solid fa-arrow-left"></i>
          </button>
        </div>

        <!-- zobrazení měsíce... při kliku výběr měsíce -->
        <div class="timebar__month-picker">
          <label for="month-input" class="month-picker__label">
            <button type="button" class="btn month-picker__trigger">
              <span id="month-text"></span> <i class="fa-solid fa-calendar-days"></i>
            </button>
          </label>
          <!-- modal pro mesic... zobrazi se po kliku ..  -->
          <input type="month" name="month" id="month-input" class="month-picker__input hidden">

        </div>

        <!-- sipka vpravo posune mesic o jeden nahoru -->
        <div class="timebar__arrow">
          <button type="button" value="nextMonth" name="step" class="btn btn-nav" id="next-month">
            <i class="fa-solid fa-arrow-right"></i>
          </button>
        </div>
      </div>

      <!-- Tohle pri kliku ukaze modal okno -->
      <div class="timebar__range">
        <button type="button" class="btn btn-outline" id="range-toggle">
          <i class="fa-solid fa-calendar-days"></i>
        </button>
        <!-- Tohle je modal pro casovy usek od-do-->
        <div class="range-panel hidden" id="range-panel">
          <div class="range-panel__field">

            <label for="range-from" class="range-panel__label">Od</label>
            <input type="date" name="od" id="range-from" class="range-panel__input">
          </div>
          <div class="range-panel__field">
            <label for="range-to" class="range-panel__label">Do</label>
            <input type="date" name="do" id="range-to" class="range-panel__input">
          </div>
          <div class="range-panel__actions">
            <!-- odešle požadavek a načte tabulky -->
            <button type="submit" name="applyRange" value="apply-range" class="btn btn-primary" id="apply-range">Použít</button>
            <!-- schová zpět modal okno -->
            <button type="button" class="btn btn-secondary" id="reset-range">Zrušit</button>
          </div>
        </div>
      </div>
      <input type="hidden" name="mode" value="month">
    </div>

  </fieldset>
</form>