<?php get_header(); ?>

<div class="l-contact__inner l-inner">
  <div class="p-contact__container">
    <h1>コンサルティングプロジェクト相談フォーム</h1>
    <p>企業様向けのプロジェクト相談につきましては下記メールフォームより承っております。<br>お気軽にお問い合わせください。</p>
    <form action="#" method="post">
      <div class="l-form__content">
        <dl class="p-form__row">
          <dt><label for="company">会社名 <span class="required">*</span></label></dt>
          <dd><input type="text" id="company" name="company" required></dd>
        </dl>
        <dl class="p-form__row">
          <dt><label for="name">担当者名 <span class="required">*</span></label></dt>
          <dd><input type="text" id="name" name="name" required></dd>
        </dl>
        <dl class="p-form__row">
          <dt><label for="email">メールアドレス <span class="required">*</span></label></dt>
          <dd><input type="email" id="email" name="email" required></dd>
        </dl>
        <dl class="p-form__row">
          <dt><label for="phone">電話番号</label></dt>
          <dd><input type="tel" id="tel" name="tel"></dd>
        </dl>
        <dl class="p-form__row">
          <dt><label for="project-type">プロジェクトの種類 <span class="required">*</span></label></dt>
          <dd>
            <select id="project-type" name="project-type" required>
              <option value="">選択してください</option>
              <option value="strategy">戦略立案</option>
              <option value="process">プロセス改善</option>
              <option value="organization">組織変革</option>
              <option value="it">IT導入</option>
              <option value="other">その他</option>
            </select>
          </dd>
        </dl>
        <dl class="p-form__row">
          <dt><label for="project-summary">ご相談内容<span class="required">*</span></label></dt>
          <dd><textarea id="project-summary" name="project-summary" required></textarea></dd>
        </dl>
      </div>
    </form>
  </div>
  <div class="l-contact__footer">
    <div class="p-contact__submit c-submit__button"><input type="submit">送信</input></div>
  </div>
</div>

<?php get_footer(); ?>