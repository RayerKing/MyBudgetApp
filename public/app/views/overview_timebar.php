<!-- =========================================================== -->
<!-- === HTML STRUKTURA PRO VYKRESLENÍ TIMEBARU pro overview === -->
<!-- =========================================================== -->

<form method="GET" class="timebar" id="timebar" >

  <fieldset class="timebar__fieldset">

    <!-- nadpis -->
    <div class="timebar__title">
      <h2>Období</h2>
    </div>

    <div class="timebar__content">
      <!-- šipka pro předchozí měsíc -->
      <div class="timebar__month">
        <div class="timebar__arrow">
          <button type="button" value="prevMonth" name="step" class="btn btn-nav" id="overview_prev-month">
            <i class="fa-solid fa-arrow-left"></i>
          </button>
        </div>

        <!-- zobrazení měsíce... při kliku výběr měsíce -->
        <div class="timebar__month-picker">
          <label for="month-input" class="month-picker__label">
            <button type="button" class="btn overview_month-picker__trigger">
              <span id="overiew_month-text"></span> <i class="fa-solid fa-calendar-days"></i>
            </button>
          </label>
          <!-- modal pro mesic... zobrazi se po kliku ..  -->
          <input type="month" name="month" id="overview_month-input" class="month-picker__input hidden">

        </div>

        <!-- sipka vpravo posune mesic o jeden nahoru -->
        <div class="timebar__arrow">
          <button type="button" value="nextMonth" name="step" class="btn btn-nav" id="overview_next-month">
            <i class="fa-solid fa-arrow-right"></i>
          </button>
        </div>
      </div>

      
      <input type="hidden" name="mode" value="month">
    </div>

  </fieldset>
</form>