<?php /* Template Name: contacts */ ?>
<?php get_header(); ?>
<main class="main">
  <section class="contacts">
    <div class="container contacts__container">
      <h1 class="visually-hidden">Контакты</h1>
      <div class="contacts__left">
        <h2 class="contacts__title blog-title">Контактная информация</h2>
        <a href="tel:<?php the_field('phone'); ?>" class="phone phone--contacts"><?php the_field('phone'); ?></a>
        <address class="address ">г. Санкт-Петербург, ул. Ленина, 9</address>
        <ul class="social list-reset">
          <li class="social__item">
            <a href="#" class="social__link social__link--fb" aria-label="Наш Фейсбук"></a>
          </li>
          <li class="social__item">
            <a href="#" class="social__link social__link--vk" aria-label="Наш ВК"></a>
          </li>
          <li class="social__item">
            <a href="#" class="social__link social__link--insta" aria-label="Наш Инстаграм"></a>
          </li>
          <li class="social__item">
            <a href="#" class="social__link social__link--tw" aria-label="Наш Твиттер"></a>
          </li>
        </ul>
      </div>
      <div class="contacts__right">
        <div class="contact-form-wrapper">
          <h2 class="contacts__title blog-title">Напишите нам</h2>
          <form action="<?php echo admin_url('admin-ajax.php?action=callback_mail')?>" class="callback-form">
            <input type="text" name='name' class="form-input callback-form__input" placeholder="Ваше имя" />
            <input type="tel" name='tel' class="form-input callback-form__input" placeholder="Ваш телефон" />
            <textarea name='msg' class="form-input callback-form__textarea" placeholder="Сообщение..."></textarea>
            <button class="callback-form__btn form-btn btn-reset">
              <span>Отправить</span>
              <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M19.5857 8.85046L1.01474 0.279244C0.719033 0.144962 0.366184 0.22496 0.160475 0.479239C-0.046663 0.733519 -0.0538057 1.09494 0.143332 1.35636L6.25033 9.49902L0.143332 17.6417C-0.0538057 17.9031 -0.046663 18.2659 0.159046 18.5188C0.297614 18.6917 0.504752 18.7845 0.714747 18.7845C0.816173 18.7845 0.917599 18.7631 1.01331 18.7188L19.5843 10.1476C19.8386 10.0304 20 9.77758 20 9.49902C20 9.22045 19.8386 8.9676 19.5857 8.85046Z" fill="white" />
              </svg>
            </button>
          </form>
        </div>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>