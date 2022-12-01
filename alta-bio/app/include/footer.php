<!-- ФУТЕР-->
<footer class="wrapper">
    <div class="footer">
        <div class="footer_grid">
            <div class="footer_elem">
                <div class="footer_elem_like">
                    <p>Чтобы не потерять этот сайт, <br> нажмите CTRL + D</p>
                </div>
                <div class="footer_elem_contacts">
                    <img src="./assets/images/icons/address.png" alt="Адрес нашего офиса">
                    <p><b>Адрес нашего офиса:</b><?= ADDRESS ?></p>
                </div>
                <div class="footer_elem_contacts">
                    <img src="./assets/images/icons/address.png" alt="Адрес нашего офиса">
                    <p><b>Телефон:</b> <?= PHONE ?></p>
                </div>
                <div class="footer_elem_contacts">
                    <img src="./assets/images/icons/address.png" alt="Адрес нашего офиса">
                    <p><b>Почта:</b><?= MAIL ?></p>
                </div>
            </div>
            <div class="footer_elem">
                <div class="footer_elem_links">
                    <ul>
                        <li>
                            <a href="/sitemap.html">Карта сайта</a>
                        </li>
                        <li>
                            <a target="_blank" href="/privacy.docx">Политика конфиденциальности</a>
                        </li>
                        <li>
                            <a href="/prav-info.pdf">Правовая информация</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="footer_elem">
                <div class="footer_elem_links">
                    Принимаем к оплате:
					<img src='./assets/images/katalog/способы оплаты.png' alt='способы оплаты футер'>
                </div>
            </div>
        </div>
        <div class="footer_prav">
            Предупреждение об ответственности за нарушение авторства материалов сайта pogreb-plastikovyj.ru. В
            соответствие со статьями 1250, 1252 ГК РФ и с п.1 ст. 1301 ГК РФ в случае нарушения авторства материалов,
            нарушителю грозит штраф от десяти тысяч рублей до пяти миллионов рублей. Дополнительно ч.1 ст.146 УК РФ
            регламентирует ответственность за присвоение авторства (плагиат) с штрафом от 200 тыс. руб. и вплоть до
            ареста до 6 месяцев. Сайт носит информационный характер и не является публичной офертой, определяемой
            положениями ГК РФ. <span class="open_partners">Рекомендуем:</span>
			<div class="partners">
				<p style="font-weight: bold;">Москва:</p>
				<a target='_blank' href="https://pogreb-plastikovyj.ru">Бесшовный погреб на дачу</a>
				<a target='_blank' href="https://unilos-astra.ru">Юнилос Астра</a>
				<p style="font-weight: bold;">Санкт-Петербург:</p>
				<a target='_blank' href="https://plastikovyj-pogreb.ru">Погреб Эксперт</a>
				<a target='_blank' href="https://zaezdy-spb.ru">Разработка участка</a>
			</div>
        </div>
    </div>
</footer>


<!-- ПОПАПЫ-->
<!-- 10 Минут-->
<div id="zayavka" class="popup">
    <div class="popup_wrapper">
        <div class="form-wrap">
            <form class="simple_form my-forms">
				<input type="hidden" name="Откуда" value="Мы вам перезвоним в течении 10 минут">
                <p style="margin-bottom: 30px;" class="h3">Мы вам перезвоним в течении 10 минут</p>
                <input class="inp_text area_js" type="text" name="name" placeholder="Ваше имя">
                <i class="-sub_inp">Мы уважаем своих клиентов и обращаемся по имени</i>
                <input class="inp_text area_js" type="tel" name="phone" placeholder="Ваше имя">
                <i class="-sub_inp">Позвоним Вам, чтобы уточнить детали. Это ни к чему
                    Вас не обязывает
                </i>
                <button class="btn">Жду звонка</button>
                <i class="politica">Нажимая на кнопку, Вы даете согласие на обработку персональных данных в соответствии
                    <a href="./privacy.docx">с&nbsp;политикой конфиденциальности</a>
                </i>
            </form>
        </div>
    </div>
</div>
<!-- SMS -->
<div id="sms" class="popup">
    <div class="popup_wrapper">
        <div class="form-wrap">
            <form class="simple_form my-forms">
				<input type="hidden" name="Откуда" value="смс когда цена снизится!">
                <p style="margin-bottom: 30px;" class="h3">Вы получите смс-ку когда цена снизится!</p>
               <input class="inp_text area_js" type="tel" name="phone" placeholder="Ваше имя">
                <button class="btn">Заказать</button>
                <i class="politica">Нажимая на кнопку, Вы даете согласие на обработку персональных данных в соответствии
                    <a href="./privacy.docx">с&nbsp;политикой конфиденциальности</a>
                </i>
            </form>
        </div>
    </div>
</div>
<!-- Быстрый заказ-->
<div id="zakaz" class="popup">
    <div class="popup_wrapper">
        <div class="form-wrap">
            <form class="simple_form my-forms">
                <input type="hidden" name="Откуда" value="быстрый заказ">
                <p style="margin-bottom: 30px;" class="h3">Вы хотите сделать быстрый заказ?</p>
                <input class="inp_text area_js" type="text" name="name" placeholder="Ваше имя">
                <i class="-sub_inp">Мы уважаем своих клиентов и обращаемся по имени</i>
                <input class="inp_text area_js" type="tel" name="phone" placeholder="Ваше имя">
                <i class="-sub_inp">Позвоним Вам, чтобы уточнить детали. Это ни к чему
                    Вас не обязывает
                </i>
                <button class="btn">Заказать</button>
                <i class="politica">Нажимая на кнопку, Вы даете согласие на обработку персональных данных в соответствии
                    <a href="./privacy.docx">с&nbsp;политикой конфиденциальности</a>
                </i>
            </form>
        </div>
    </div>
</div>
<!-- Больше информации -->
<div id="more-info" class="popup">
	<div class="popup_wrapper">
		<div class="form-wrap">
			<form class="simple_form my-forms">
				<input type="hidden" name="Откуда" value="Нужно больше информации">
				<p style="margin-bottom: 30px;" class="h3">Нужно больше информации?</p>
				<input class="inp_text area_js" type="text" name="name" placeholder="Ваше имя">
				<i class="-sub_inp">Мы уважаем своих клиентов и обращаемся по имени</i>
				<input class="inp_text area_js" type="tel" name="phone" placeholder="Ваше имя">
				<i class="-sub_inp">Позвоним Вам, чтобы уточнить детали. Это ни к чему
					Вас не обязывает
				</i>
				<button class="btn">Узнать подробнее</button>
				<i class="politica">Нажимая на кнопку, Вы даете согласие на обработку персональных данных в соответствии
					<a href="./privacy.docx">с&nbsp;политикой конфиденциальности</a>
				</i>
			</form>
		</div>
	</div>
</div>
<!-- Выиграл Скидку-->
<div id="skidka" class="popup">
	<div class="popup_wrapper">
		<div class="form-wrap">
			<form class="simple_form my-forms">
				<input type="hidden" name="Откуда" value="Выиграл скидку 10%">
				<p style="margin-bottom: 30px;" class="h3">ВЫ ВЕЗУНЧИК!<br> Ваша скидка 10%</p>
				<input class="inp_text area_js" type="text" name="name" placeholder="Ваше имя">
				<i class="-sub_inp">Мы уважаем своих клиентов и обращаемся по имени</i>
				<input class="inp_text area_js" type="tel" name="phone" placeholder="Ваше имя">
				<i class="-sub_inp">Позвоним Вам, чтобы уточнить детали. Это ни к чему
					Вас не обязывает
				</i>
				<button class="btn">Забрать скидку</button>
				<i class="politica">Нажимая на кнопку, Вы даете согласие на обработку персональных данных в соответствии
					<a href="./privacy.docx">с&nbsp;политикой конфиденциальности</a>
				</i>
			</form>
		</div>
	</div>
</div>
<!-- Рассрочка -->
<div id="rassr" class="popup">
	<div class="popup_wrapper">
		<div class="form-wrap">
			<form class="simple_form my-forms">
				<input type="hidden" name="Откуда" value="Рассрочка">
				<p style="margin-bottom: 30px;" class="h3">Нужна рассрочка?</p>
				<input class="inp_text area_js" type="text" name="name" placeholder="Ваше имя">
				<i class="-sub_inp">Мы уважаем своих клиентов и обращаемся по имени</i>
				<input class="inp_text area_js" type="tel" name="phone" placeholder="Ваше имя">
				<i class="-sub_inp">Позвоним Вам, чтобы уточнить детали. Это ни к чему
					Вас не обязывает
				</i>
				<button class="btn">Хочу рассрочку</button>
				<i class="politica">Нажимая на кнопку, Вы даете согласие на обработку персональных данных в соответствии
					<a href="./privacy.docx">с&nbsp;политикой конфиденциальности</a>
				</i>
			</form>
		</div>
	</div>
</div>
<!--РАБОТА-->
<div id="rabota" class="popup">
	<div class="popup_wrapper">
		<div class="form-wrap">
			<form class="simple_form my-forms">
				<input type="hidden" name="Откуда" value="Нужна работа">
				<p style="margin-bottom: 30px;" class="h3">Нужна работа?</p>
				<input class="inp_text area_js" type="text" name="name" placeholder="Ваше имя">
				<i class="-sub_inp">Мы уважаем своих клиентов и обращаемся по имени</i>
				<input class="inp_text area_js" type="tel" name="phone" placeholder="Ваше имя">
				<i class="-sub_inp">Позвоним Вам, чтобы уточнить детали. Это ни к чему
					Вас не обязывает
				</i>
				<button class="btn">Жду звонка</button>
				<i class="politica">Нажимая на кнопку, Вы даете согласие на обработку персональных данных в соответствии
					<a href="./privacy.docx">с&nbsp;политикой конфиденциальности</a>
				</i>
			</form>
		</div>
	</div>
</div>
<!--КОНСУЛЬТАЦИЯ-->
<div id="kons" class="popup">
	<div class="popup_wrapper">
		<div class="form-wrap">
			<form class="simple_form my-forms">
				<input type="hidden" name="Откуда" value="Нужна консультация?">
				<p style="margin-bottom: 30px;" class="h3">Нужна консультация?</p>
				<input class="inp_text area_js" type="text" name="name" placeholder="Ваше имя">
				<i class="-sub_inp">Мы уважаем своих клиентов и обращаемся по имени</i>
				<input class="inp_text area_js" type="tel" name="phone" placeholder="Ваше имя">
				<i class="-sub_inp">Позвоним Вам, чтобы уточнить детали. Это ни к чему
					Вас не обязывает
				</i>
				<button class="btn">Жду звонка</button>
				<i class="politica">Нажимая на кнопку, Вы даете согласие на обработку персональных данных в соответствии
					<a href="./privacy.docx">с&nbsp;политикой конфиденциальности</a>
				</i>
			</form>
		</div>
	</div>
</div>
<!-- ПОПАПЫ КОНЕЦ-->

<!-- ПОПАПЫ ИЗБРАННОЕ, КОРЗИНА И СРАВНЕНИЕ ТД-->
<!--ИЗБРАННОЕ (СЕРДЕЧКО)-->
<div id='liked' class='popup'>
	<div class="form_catalog_wrapper">
		<div class="form-wrap">
			<form class="my-forms form_catalog form_liked_wrapper_js">
				<input type="hidden" name="Откуда" value="Сравнение">
				<div class='form_catalog_data_insert_js'><b>Не знаете что конкретно выбрать?</b></div>
				<!-- Сюда будет попадать контент -->
				<div class='form_catalog_submit'>
					<b>Мы ответим на все вопросы и расскажем нюансы!</b>
					<input class="inp_text area_js" type="tel" name="phone" placeholder="Ваше имя">
					<button class="btn">Жду звонка</button>
					<i class="politica">Позвоним Вам, чтобы уточнить детали. Это ни к чему Вас не обязывает</i>
					<i class="politica">Нажимая на кнопку, Вы даете согласие на обработку персональных данных в соответствии <a href="./privacy.docx">с&nbsp;политикой конфиденциальности</a>
					</i>
				</div>
			</form>
		</div>
	</div>
</div>
<!--СРАВНЕНИЕ-->
<div id='compare' class='popup'>
	<div class="form_catalog_wrapper">
		<div class="form-wrap">
			<form class="my-forms form_catalog form_compare_wrapper_js">
				<input type="hidden" name="Откуда" value="Сравнение">
				<b class='form_catalog_data_insert_js'>Сравниваете между собой?</b>
				<!-- Сюда будет попадать контент -->
				<div class='form_catalog_submit'>
					<b>Мы ответим на все вопросы и расскажем нюансы!</b>
					<input class="inp_text area_js" type="tel" name="phone" placeholder="Ваше имя">
					<button class="btn">Жду звонка</button>
					<i class="politica">Позвоним Вам, чтобы уточнить детали. Это ни к чему Вас не обязывает</i>
					<i class="politica">Нажимая на кнопку, Вы даете согласие на обработку персональных данных в соответствии <a href="./privacy.docx">с&nbsp;политикой конфиденциальности</a>
					</i>
				</div>
			</form>
		</div>
	</div>
</div>
<!--КОРЗИНА-->
<div id='cart' class='popup'>
	<div class="form_catalog_wrapper">
		<div class="form-wrap">
			<form class="my-forms form_catalog form_cart_wrapper_js">
				<input type="hidden" name="Откуда" value="Сравнение">
				<b class='form_catalog_data_insert_js'>Быстрое оформление заказа</b>
				<!-- Сюда будет попадать контент -->
				<div class='form_catalog_submit'>
					<b>Мы позвоним, уточним детали и оформим Ваш заказ!</b>
					<input class="inp_text area_js" type="tel" name="phone" placeholder="Ваше имя">
					<button class="btn">Сделать заказ</button>
					<i class="politica">Позвоним Вам, чтобы уточнить детали. Это ни к чему Вас не обязывает</i>
					<i class="politica">Нажимая на кнопку, Вы даете согласие на обработку персональных данных в соответствии <a href="./privacy.docx">с&nbsp;политикой конфиденциальности</a>
					</i>
				</div>
			</form>
		</div>
	</div>
</div>
<!--УВЕДОМЛЕНИЕ О НАЖАТИИ-->
<div class='notification notification_js'>
	Добавлено в корзину
</div>



</body>
<script src="./assets/js/main.js"></script>
</html>













