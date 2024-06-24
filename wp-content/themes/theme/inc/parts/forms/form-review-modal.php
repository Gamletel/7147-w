<div class="form form-v2 form-review-modal theme-modal-review">
    <h2 class="form__title">Оставить отзыв</h2>

    <div class="form__subtitle p2">Отзыв пройдет модерацию и появится на сайте</div>

    <div class="form__inputs">
        <input class="input" type="text" name="your-name" placeholder="Имя*" required>

        <input class="input" type="tel" name="your-tel" placeholder="Номер телефона">

        <textarea name="your-comment" class="input" placeholder="Текст отзыва*" required></textarea>

        <div class="form__file file">
            <label for="file">
                <span class="file__title">+ Прикрепить файл</span>
                <input id="file" type="file" name="your-file" class="hidden">
            </label>
        </div>
    </div>

    <div class="form__bottom">
        <button class="btn-mini" type="submit" form-send>
            Отправить
        </button>

        <div class="policy p3">Я подтверждаю, что ознакомлен с
            <a href="/privacy-policy" target="_blank">политикой конфеденциальности</a>
        </div>
    </div>
</div>