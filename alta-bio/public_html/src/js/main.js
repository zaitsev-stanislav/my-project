document.addEventListener("DOMContentLoaded", () => {
    // !-----------------------------------------------------------------!
    // Открытие менюшки
    function showMenu(){
        const btn = document.querySelector(".burger_js"),
            menu = document.querySelector(".header_links_js"),
            links = menu.querySelectorAll("a");
        btn.addEventListener("click", () => {
            menu.classList.toggle("-active");
        });
        links.forEach(elem => {
            elem.addEventListener("click", () => {
                menu.classList.remove("-active");
                setTimeout(() => {
                    window.scrollBy(0, -150)
                }, 1)
            });
        });
    }
    showMenu();
    // !-----------------------------------------------------------------!
    //    ДРЕНАЖНЫЕ СИСТЕМЫ ПОКАЗАТЬ БОЛЬШЕ
    //    Функция чтобы показать доп инфу
    function drenazhSystemShowDopInfo(){
        let btn = document.querySelectorAll(".drenazh_elem_show_btn"),
            info = document.querySelectorAll(".drenazh_system_show_item_js");
        if(btn.length === 0 || info.length === 0){
            return;
        }
        // -active
        //    Скроем все доп поля
        btn.forEach((elem, i) => {
            elem.addEventListener("click", () => {
                info.forEach((hide, ih) => {
                    if(i !== ih){
                        hide.classList.remove("-active");
                    }
                });
                info[i].classList.toggle("-active");
            });
        });
    }
    drenazhSystemShowDopInfo();
    // !-----------------------------------------------------------------!
    //    Слайдер фотоотчета
    try{
        const photoOtchetSlider = document.querySelectorAll(".photo_otchet_slider_js");
        photoOtchetSlider.forEach(elem => {
            new Carousel(elem, {
                Dots:false
            });
        });
    }catch(e){
    }
    //    СЛАЙДЕР ДЛЯ СТРАНИЦЫ ТОВАРА
    try{
        const tp_slider1 = new Carousel(document.querySelector(".tp_slider1"), {
            Dots:false
        });
        const tp_slider2 = new Carousel(document.querySelector(".tp_slider2"), {
            Sync:{
                target:tp_slider1
            },
            Dots:false,
            Navigation:false,
            infinite:false,
            center:true,
            slidesPerPage:1
        });
    }catch(e){
    }
    //    Выключить автофокус у фенсибокс
    Fancybox.bind("[data-fancybox]", {
        autoFocus:false,
        click: false,
        dragToClose: false
    });
    // !-----------------------------------------------------------------!
    //    QUIZ
    class Quiz{
        _quiz;
        _quizWrap;
        _radInp;
        _btnBack;
        _iKey;
        _area;
        _btnArea;
        constructor(quizID){
            this._quiz = document.getElementById(quizID);
            if(this._quiz === null){
                return;
            }
            this._quizWrap = this._quiz.querySelectorAll(".quiz_wrap_js");
            this._area = this._quiz.querySelector(".area_js");
            this._btnArea = this._quiz.querySelector(".area_js_btn");
            this._radInp = this._quiz.querySelectorAll("input[type=radio]");
            this._btnBack = this._quiz.querySelectorAll(".quiz_back_js");
            this._iKey = 0;
            this.addListener();
            this.addListenerToBtnBack();
        }
        addListener(){
            this._radInp.forEach(elem => {
                elem.addEventListener("click", (e) => {
                    console.log(e.target);
                    this.next();
                });
            });
            this.check_correct();
        }
        check_correct(){
            this._btnArea.addEventListener("click", () => {
                let area_error = this._quiz.querySelector(".area_error");
                if(this._area.value.trim() === "" || this._area.value.trim() === " " || parseInt(this._area.value.trim()) <= 0){
                    area_error.style.display = "block";
                }else{
                    this.next();
                }
            });
        }
        addListenerToBtnBack(){
            this._btnBack.forEach(elem => {
                elem.addEventListener("click", () => {
                    this.prev();
                });
            });
        }
        next(){
            this._quizWrap[this._iKey].style.display = "none";
            this._quizWrap[this._iKey + 1].style.display = "block";
            this._iKey++;
        }
        prev(){
            this._quizWrap[this._iKey].style.display = "none";
            this._quizWrap[this._iKey - 1].style.display = "block";
            this._iKey--;
            this._radInp.forEach(elem => {
                if(elem.dataset.name === `quiz_rad_${this._iKey}`){
                    elem.checked = false;
                }
            });
        }
    }

    let quiz1 = new Quiz("quiz-1");
    // !-----------------------------------------------------------------!
    //    ПОКАЗАТЬ ДОП ЭЛЕМЕНТЫ
    //     Логика для всех блоков данного типа
    function showMoreLogic(countVisible, classElements, classBtn, classParent){
        let elements, btn, parent, parentHeight = 0;
        try{
            parent = document.querySelector(`.${classParent}`);
            elements = document.querySelectorAll(`.${classElements}`);
            btn = document.querySelector(`.${classBtn}`);
        }catch(e){
            console.log("Функция showMoreLogic. Нет элементов на странице. " + e);
            return;
        }
        if(parent === null || elements === null || btn === null){
            return;
        }
        // скрыть лишние элементы
        elements.forEach((elem, i) => {
            if(i >= parseInt(countVisible)){
                elem.classList.add("-hide");
            }
        });
        // Показать элементы при клике
        btn.addEventListener("click", () => {
            console.log("e");
            parentHeight = parent.getBoundingClientRect().height;
            // Меняем текст на кнопке
            if(elements[countVisible].classList.contains("-hide")){
                btn.textContent = "Скрыть";
            }else{
                btn.textContent = "Показать все ↓";
                // чтобы экран пользователь оставался на том же месте где и был
                parentHeight = parent.getBoundingClientRect().height - parentHeight;
                window.scrollBy(0, -parentHeight);
            }
            // Скрываем элементы
            elements.forEach((elem, i) => {
                if(i >= parseInt(countVisible)){
                    elem.classList.toggle("-hide");
                }
            });
        });
    }
    //
    // showMoreLogic(6, "filter_content_elem_js", "filter_btn_js", "filter_content_js");
    //Логика для табов и таблиц
    function myTabs(classWrapElements, classBtn, classContent){
        // classWrapElements - обертка (родитель в котором находятся активные элементы) при нажатии будет срабатывать открытие контента
        // classBtn - кнопка анимации (будет галочка вращаться)
        // classContent - сам контент который будет открываться
        let elements = document.querySelectorAll(`.${classWrapElements}`);
        if(elements === null){
            return;
        }
        elements.forEach(elem => {
            let btn = elem.querySelector(`.${classBtn}`),
                content = elem.querySelector(`.${classContent}`);
            elem.addEventListener("click", function(e){
                if(e.target.closest('.price_table_title')){
                    btn.classList.toggle("-active");
                    content.classList.toggle("-hide");
                }
                // Доп логика для блока вопросы и ответы (жесткая привязка к классу)
                if(classWrapElements === "question_elem_js"){
                    btn.classList.toggle("-active");
                    content.classList.toggle("-hide");
                    elem.classList.toggle("-no_height");
                }
            });
        });
    }
    myTabs("price_table_js", "price_table_drop_js", "price_table_content_js");
    myTabs("question_elem_js", "question_btn_js", "question_content_js");

    // !-----------------------------------------------------------------!
    // РАЗВЕРНУТЬ ТЕКСТ В БЛОКЕ МАТЕРИАЛЫ
    function materialShow(){
        let elements;
        try{
            elements = document.querySelectorAll(".material_show_js");
        }catch(e){
            console.log("Ошибка в materialShow. Нет этих элементов" + e);
            return;
        }
        if(elements === null){
            return;
        }
        elements.forEach(elem => {
            try{
                let btn = elem.querySelector(".material_showBtn_js"),
                    btnHide = elem.querySelector(".material_hideBtn_js"),
                    hideContent = elem.querySelector(".material_hideContent_js");
                btn.addEventListener("click", () => {
                    btn.classList.toggle("-hide");
                    btnHide.classList.toggle("-hide");
                    hideContent.classList.toggle("-hide");
                });
                btnHide.addEventListener("click", () => {
                    btn.classList.toggle("-hide");
                    btnHide.classList.toggle("-hide");
                    hideContent.classList.toggle("-hide");
                });
            }catch(e){
            }
        });
    }
    materialShow();
    // !-----------------------------------------------------------------!

    //    Отправка на сервер
    //Поиск моих форм по странице
    function findMyForms(){
        let forms = document.querySelectorAll(".my-forms");
        forms.forEach(form => {
            // Для проверки данных в переменно $_POST
            // form.method = "POST";
            // form.action = "/fn";
            form.addEventListener("submit", (e) => {
                e.preventDefault();
                form.querySelector("button").disabled = true; // отключил кнопку
                form.querySelector("button").style.opacity = "0.6";
                req(e, form);
            });
        });
    }
    findMyForms();
    //Получаем ответ от сервера
    function req(e, actionElem){
        let formData = new FormData(actionElem);
        /*for (const pair of formData.entries()) {
            console.log(`${pair[0]}, ${pair[1]}`); // проверка того какие данные в форме
        }*/
        //Проверка ЕСТЬ ЛИ ФАЙЛ
        if(formData.has("userfile")){
            // проверка пустой ли файл
            if(formData.get("userfile").name !== "" || formData.get("userfile").type !== "application/octet-stream"){
                //Проверка на тип файла. Проходит по перечню и выдает false если найдет совпадение
                if(formData.get("userfile").type !== "application/vnd.openxmlformats-officedocument.wordprocessingml.document" &&
                    formData.get("userfile").type !== "application/msword" &&
                    formData.get("userfile").type !== "application/pdf" &&
                    formData.get("userfile").type !== "image/jpeg" &&
                    formData.get("userfile").type !== "image/png"){
                    return showPopup("format");
                    //Проверка на размер файла (до 10 Мб)10485760
                }else if(formData.get("userfile").size > 10485760){
                    return showPopup("bigsize");
                }
                //Если файла не загрузили то удаляем это поле
            }else{
                formData.delete("userfile");
            }
        }
        //Проверка МАСКИ ТЕЛЕФОНА +7(xxx) ......
        if(
            formData.get("phone").length !== 17 ||
            formData.get("phone")[0] !== "+" ||
            formData.get("phone")[1] !== "7" ||
            formData.get("phone")[2] !== "(" ||
            formData.get("phone")[3] === "8" ||
            formData.get("phone")[6] !== ")" ||
            formData.get("phone")[16] === "_"
        ){
            return showPopup("wrong", actionElem);
        }
        //    ДОБАВИТЬ ДАННЫЕ ИЗ ПСЕВДОФИЛЬТРА В ФОРМУ
        if(actionElem.classList.contains("psevdo_form_js")){
            let data_link = data_filter.querySelectorAll(".filter_select_js > a");
            data_link.forEach((elem, i) => {
                formData.append(desc_filter[i], elem.textContent);
            });
        }
        // formData.delete("politica");
        getData("/fn", formData)
        .then(data => showPopup(data, actionElem));
    }
    // Запрос к серверу
    async function getData(url, data){
        const res = await fetch(`${url}`, {
            method:"POST",
            body:data
        });
        if(!res.ok){
            console.log("Error: " + res.status);
        }
        return await res.text();
    }
    //Всплывашка с подтверждением / отказом
    function showPopup(data, form){
        let div = document.createElement("div"),
            p = document.createElement("p"),
            span = document.createElement("span"),
            closeBtn = document.createElement("b");
        //close btn
        closeBtn.addEventListener("click", () => {
            div.remove();
        });
        //Check server - response
        if(data === "success"){
            // p.innerHTML = "Спасибо за заявку!";
            // span.innerHTML = "Мы свяжемся с вами в самое ближайшее время";
            // div.classList.remove("my-popup-error");
            // div.classList.add("my-popup-done");
            // //  Отчистим форму
            // clearMyForm(form);
            document.location.href = "/thanks";
            return;
        }else if(data === "wrong"){
            p.innerHTML = "Неверно ввели номер";
            span.innerHTML = "Пожалуйста, проверьте верно ли вы ввели номер. Номер должен начинаться с +7(ххх) и иметь длинну 11 цифр";
            div.classList.remove("my-popup-done");
            div.classList.add("my-popup-error");
            form.querySelector("button").disabled = false;
            form.querySelector("button").style.opacity = "1";
        }else if(data === "bigsize"){
            p.innerHTML = "Ошибка";
            span.innerHTML = "Простите, но размер вашего файла не должен быть больше 10 Мб";
            div.classList.remove("my-popup-done");
            div.classList.add("my-popup-error");
        }else if(data === "format"){
            p.innerHTML = "Неверный формат";
            span.innerHTML = "Формат вашего файла должен быть: .doc, .docx, .pdf, .jpeg, .jpg, .png";
            div.classList.remove("my-popup-done");
            div.classList.add("my-popup-error");
            form.querySelector("button").disabled = false;
            form.querySelector("button").style.opacity = "1";
        }else{
            p.innerHTML = "Что то пошло не так";
            span.innerHTML = "Пожалуйста, повторите еще, если ошибка не исчезнет дайте нам знать";
            div.classList.add("my-popup-error");
            form.querySelector("button").disabled = false;
            form.querySelector("button").style.opacity = "1";
        }
        //general things for pop-up
        div.classList.add("show-my-wrapper");
        closeBtn.append(document.createElement("i"));
        div.append(p, span, closeBtn);
        document.body.appendChild(div);
    }
    //    Анимация скрола
    function animate({timing, draw, duration}){
        //Получили время начало анимации (не меняется)
        let start = performance.now();
        requestAnimationFrame(function animate(time){
            /* time - время которое идет с начала анимации до ее конца (меняется)
             *  То есть начала будет = start*/
            // timeFraction изменяется от 0 до 1
            let timeFraction = (time - start) / duration;
            if(timeFraction > 1) timeFraction = 1;
            // вычисление текущего состояния анимации
            let progress = timing(timeFraction);
            draw(progress); // отрисовать её
            if(timeFraction < 1){
                requestAnimationFrame(animate);
            }
        });
    }
    // Добавить маски на телефоны
    function addMask(){
        let phones = document.querySelectorAll("input[name=phone]");
        let options = {
            mask:"+{7}(000) 000 00 00",
            lazy:false
        };
        phones.forEach(elem => {
            IMask(elem, options);
        });
    }
    addMask();
    // Открыть / скрыть блок партнеров в футере
    function showPartners() {
        const btn = document.querySelector('.open_partners'),
            box = document.querySelector('.partners');
        btn.addEventListener('click', () => {
            box.classList.toggle('active');
        })
    }showPartners()
    // Ленивая загрузка изображений ДЛЯ ИЗОБРАЖЕНИЙ КОТОРЫЕ НЕ НАХОДЯТСЯ В СЛАЙДЕРЕ
    // Пишем class="lazy" + тег data-src="ссылка" для этих изображений, а src=""
    let lazyloadImages;
    if("IntersectionObserver" in window){
        lazyloadImages = document.querySelectorAll(".lazy");
        let imageObserver = new IntersectionObserver(function(entries, observer){
            entries.forEach(function(entry){
                if(entry.isIntersecting){
                    var image = entry.target;
                    image.src = image.dataset.src;
                    image.classList.remove("lazy");
                    imageObserver.unobserve(image);
                }
            });
        });
        lazyloadImages.forEach(function(image){
            imageObserver.observe(image);
        });
    }else{
        let lazyloadThrottleTimeout;
        lazyloadImages = document.querySelectorAll(".lazy");
        function lazyload(){
            if(lazyloadThrottleTimeout){
                clearTimeout(lazyloadThrottleTimeout);
            }
            lazyloadThrottleTimeout = setTimeout(function(){
                let scrollTop = window.pageYOffset;
                lazyloadImages.forEach(function(img){
                    if(img.offsetTop < (window.innerHeight + scrollTop)){
                        img.src = img.dataset.src;
                        img.classList.remove("lazy");
                    }
                });
                if(lazyloadImages.length === 0){
                    document.removeEventListener("scroll", lazyload);
                    window.removeEventListener("resize", lazyload);
                    window.removeEventListener("orientationChange", lazyload);
                }
            }, 20);
        }
        document.addEventListener("scroll", lazyload);
        window.addEventListener("resize", lazyload);
        window.addEventListener("orientationChange", lazyload);
    }
    // -------------- preventDefault --------------------
    function removeLink(){
        let a_arr = document.querySelectorAll(".remove_link");
        a_arr.forEach(elem => {
            elem.addEventListener("click", (e) => {
                e.preventDefault();
            });
        });
    }
    removeLink();
    // -------------- preventDefault END --------------------

    // -------------- FILTER --------------------
    // Переключение списка фильтра
    function filterSelect(){
        let selectElements = document.querySelectorAll(".filter_select_js"),
            lists = document.querySelectorAll(".filter_list_js");
        // Показать список фильтрации при клике
        selectElements.forEach((elem, i) => {
            elem.addEventListener("click", function(e){
                e.preventDefault();
                //Показали список
                if(e.target.closest(".-list") === null){
                    lists[i].classList.toggle("-hide");
                }
            });
        });
        lists.forEach((elem, i) => {
            let listElements = elem.querySelectorAll("a");// Все элементы внутри списка
            listElements.forEach(listElem => {
                listElem.addEventListener("click", function(e){
                    e.preventDefault();
                    // Удалить жирность у всех элементов
                    listElements.forEach(removeBold => {
                        removeBold.style.fontWeight = "normal";
                    });
                    // Удалим элемента из оглавления фильтра и поместим туда выбранный элемент
                    selectElements[i].querySelector("a").remove();
                    selectElements[i].append(this.cloneNode(true));
                    this.style.fontWeight = "bold";
                    // Скрою список
                    elem.classList.toggle("-hide");
                });
            });
        });
    }
    filterSelect();
    // Фильтрация элементов
    function filterElements(){
        let button = document.querySelector(".filter_btn_js"),
            filterWrapper = document.querySelector(".filter_content_js"),
            filterElements = document.querySelectorAll(".filter_content_elem_js"); // все элементы фильтра
        let newListElements = Array.from(filterElements); // Список отфильтрованных элементов
        let filterSelection; // теги а по которым происходит фильтрация
        // Кнопка показа элементов (по 6 шт, "показать еще")
        let filterShowMoreBtn = document.querySelector(".filter_btn_showmore_js");
        // Активация фильтрования
        button.addEventListener("click", () => {
            filterSelection = document.querySelectorAll(".filter_select_js > a");
            // Данные из фильтров
            let name = filterSelection[0], // Назначение
                marka = filterSelection[1], // принцип и свойства
                mont_price = filterSelection[2]; // по цене
            newListElements = Array.from(filterElements); // в новый фильтр вставили все элементы

            // ПОИСК ПО НАЗНАЧЕНИЮ - ДА (РАНДОМНЫЙ ВЫБОР)
            if(name.dataset.def !== "true"){
                let key = false;
                let rand = Math.floor(Math.random() * (4 - 1) + 1) // выборка от 3 до 8
                newListElements = newListElements.filter((elem, i) => {
                    if(i % rand === 0) {
                        key = true;
                    }else {
                        key = false;
                    }
                    return key
                })
            }
            console.log(newListElements);

            // ПОИСК ПО ПРИНЦИП И СВОЙСТВА - ДА (РАНДОМНЫЙ ВЫБОР)
            if(marka.dataset.def !== "true"){
                let key = false;
                let rand = Math.floor(Math.random() * (4 - 1) + 1) // выборка от 3 до 8
                newListElements = newListElements.filter((elem, i) => {
                    // console.log(rand);
                    if(i % rand === 0) {
                        key = true;
                    }else {
                        key = false;
                    }
                    return key
                })
            }

            // ПОИСК ПО ЦЕНЕ - ДА
            if (mont_price.dataset.def !== "true") {
                newListElements = newListElements.filter(elem => {
                    let e_sepPrice = parseInt(elem.querySelector('.f_septik_price_js').textContent);
                    switch (mont_price.dataset.oborud) {
                        case "100-199":
                            if (e_sepPrice >= 100000 && e_sepPrice <= 199999) {
                                return true
                            }
                            break;
                        case "200-299":
                            if (e_sepPrice >= 200000 && e_sepPrice <= 299999) {
                                return true
                            }
                            break;
                        case "300-499":
                            if (e_sepPrice >= 300000 && e_sepPrice <= 499999) {
                                return true
                            }
                            break;
                        case "500>":
                            if (e_sepPrice > 500000) {
                                return true
                            }
                            break;
                    }
                })
            }





            // Если новых элементов <= 6 шт, то скроем кнопку "Показать еще"
            newListElements.length <= 6
                ? filterShowMoreBtn.style.display = "none"
                : filterShowMoreBtn.style.display = "block";
            render(newListElements);
        });
        let i_key = 6; // переменная для отображения элементов по 6 шт
        // Отрисовка новых элементов согласно фильтру
        function render(elements){
            console.log(elements);
            // Удалить все элементы
            while(filterWrapper.firstChild){
                filterWrapper.removeChild(filterWrapper.firstChild);
            }
            // Если нет элементов которые подходят условию фильтра
            if(elements.length === 0){
                filterWrapper.append(document.createElement("p")
                    .textContent = "Товаров согласно вашему запросу нет");
            }else{
                // Заново отрисовать
                elements.forEach((elem, i) => {
                    if(i < 6){
                        elem.classList.remove("-hide");
                        filterWrapper.append(elem);
                    }else{
                        elem.classList.add("-hide");
                        filterWrapper.append(elem);
                    }
                });
                i_key = 6;
            }
        }
        //  Показывать по 6 элементов фильтра
        function filterShowMore(){
            // Высота род. блок чтобы сделать скролл вверх к началу фильтра
            let parentHeight = filterWrapper.getBoundingClientRect().height;
            filterShowMoreBtn.addEventListener("click", () => {
                // Если есть элементы, которые надо показывать
                if(newListElements.length > i_key){
                    // то покажем следующие 6 элементов
                    for(let i = 0; i < 6; i++){
                        if(newListElements[i_key + i] !== undefined){
                            newListElements[i_key + i].classList.remove("-hide");
                        }else{
                            break;
                        }
                    }
                    i_key += 6;
                    // Поменяем текст на кнопке, когда все элементы кончились
                    if(newListElements.length <= i_key){
                        filterShowMoreBtn.textContent = "Скрыть";
                    }
                }else{
                    // Скрол обратно к началу фильтра
                    parentHeight = filterWrapper.getBoundingClientRect().height;
                    // Скрыть все элементы, кроме 1-6
                    for(let i = 6; i < newListElements.length; i++){
                        newListElements[i].classList.add("-hide");
                    }
                    window.scrollBy(0, -parentHeight);
                    filterShowMoreBtn.textContent = "Показать еще";
                    i_key = 6;
                }
            });
        }
        filterShowMore();
    }
    filterElements();
    // -------------- FILTER END --------------------

    // -------------- ЛОГИКА ДОБАВЛЕНИЯ ТОВАРОВ В КОРЗИНУ / ИЗБРАННОЕ И ТД --------------------
    function filterOptions(){
        let carts = document.querySelectorAll(".filter_content_elem_js"),
            basketLiked = document.querySelector(".form_liked_wrapper_js"), // Форма корзины избранного
            basketCompare = document.querySelector(".form_compare_wrapper_js"), // Форма корзины сравнений
            basketCart = document.querySelector(".form_cart_wrapper_js"); // Форма корзины для корзины :D

        let countElemInCart = 0; // Элемент для просчета элементов в корзине и отображения на странице
        let countCart = document.querySelector(".count_cart_js"); // Сюда будет записываться число из счетчика

        // Логика кнопок добавления карточек в корзину
        carts.forEach(elem => {
            elem.addEventListener("click", function(e){
                // Достанем нужные данные
                let divImg = elem.querySelector(".-img").cloneNode(true),
                    elemName = elem.querySelector(".filter_elem_name_js").textContent;

                // СРАВНЕНИЕ
                if(e.target.classList.contains("-compare")){
                    // Вставил данные в корзину
                    basketCompare.querySelector(".form_catalog_data_insert_js")
                    .append(createCartElem(elemName, divImg));
                    // Отправил уведомление
                    showNotification ("compare")
                }
                // ИЗБРАННОЕ
                else if(e.target.classList.contains("-like")){
                    // Вставил данные в корзину
                    basketLiked.querySelector(".form_catalog_data_insert_js")
                    .append(createCartElem(elemName, divImg));
                    // Отправил уведомление
                    showNotification ("like")
                }
                // КОРЗИНА
                else if(e.target.classList.contains("-cart")){
                    // Вставил данные в корзину
                    basketCart.querySelector(".form_catalog_data_insert_js")
                    .append(createCartElem(elemName, divImg));
                    // Отправил уведомление
                    showNotification ("cart")
                    // обновил счетчик элементов в корзине
                    countElemInCart++;
                    countCart.textContent = countElemInCart.toString();
                }
                // Свернуть / развернуть текст в описании
                else if(e.target.classList.contains("filter_elem_desc_BTN_js")){
                    this.querySelector(".-desc").classList.toggle("-active")
                }
            });
        });

        // Функция по создание HTML для вставки в корзину и удалению элементов из нее
        function createCartElem(elemName, divImg){
            let form_catalog_content = document.createElement("div"), // Главный wrapper
                inp = document.createElement("input"), // для отправки данных из формы
                divText = document.createElement("div"), // где хранится весь текст
                pName = document.createElement("p"), // тут пишется название
                remove = document.createElement("div"); // кнопка удаления эл-та из корзины


            //Добавлю нужные классы для блоков
            form_catalog_content.classList.add("form_catalog_content");
            divText.classList.add("-text")
            remove.classList.add("-remove");
            //ОБРАБОТЧИК УДАЛЕНИЯ КАРТОЧКИ
            remove.addEventListener("click", () => {
                // Если удалили элемент из корзины - то отнимаем счетчик
                if(remove.closest("#cart")){
                    countElemInCart--;
                    countCart.textContent = countElemInCart.toString();
                }
                remove.closest(".form_catalog_content").remove();


            })
            //------------------------------


            // Добавлю атрибуты для инпута
            inp.type = "checkbox";
            inp.name = elemName;
            inp.checked = true;
            inp.value = "Выбрали";
            //------------------------------
            form_catalog_content.append(inp); // Вставил инпут
            form_catalog_content.append(divImg); // Вставил блок с фото
            //------------------------------
            // Добавил в блок -text информацию
            pName.textContent = elemName;
            divText.append(pName);
            remove.textContent = "удалить из списка";
            divText.append(remove);
            //------------------------------
            form_catalog_content.append(divText); // Добавил заполненный блок
            return form_catalog_content;
        }
    }
    filterOptions();

    // Показать уведомление что товар добавили
    function showNotification (where) {
        let notify = document.querySelector(".notification_js");
        switch(where){
            case "like":
                notify.textContent = "Добавлено в избранное"
                notify.style.display = "block";
                setTimeout(()=> {
                    notify.style.display = "none";
                }, 1300)
                break
            case "compare":
                notify.textContent = "Добавлено в сравнение"
                notify.style.display = "block";
                setTimeout(()=> {
                    notify.style.display = "none";
                }, 1300)
                break
            case "cart":
                notify.textContent = "Добавлено в корзину"
                notify.style.display = "block";
                setTimeout(()=> {
                    notify.style.display = "none";
                }, 1300)
                break
            case "akcii":
                notify.textContent = "Тут пусто! Ищите дальше!"
                notify.style.display = "block";
                setTimeout(()=> {
                    notify.style.display = "none";
                }, 1300)
                break

        }
    }


    // АЛГОРИТМ ДЛЯ АКЦИИ
    function randomAkcii() {
        let elemetns = document.querySelectorAll(".akcii_elemts_js > a");
        let rand = Math.floor(Math.random() * elemetns.length - 1);
        // let rand = 1

        elemetns.forEach((elem, i) => {
            if (rand !== i) {
               elem.addEventListener("click", (e) => {
                   e.preventDefault();
                   showNotification('akcii')
               })
            }else {
                elemetns[rand].setAttribute('data-fancybox', '');
                elemetns[rand].setAttribute('data-src', '#skidka');
            }


        })


    }
    randomAkcii()

    //    КОНЕЦ ЛОГИКИ КОРЗИНЫ И ТД

    // ПОИСК ПО СТРАНИЦЕ
    function search () {
        let text = document.querySelector(".search_js");
        let btn = document.querySelector(".search_btn_js");
        var instance = new Mark(document);

        btn.addEventListener("click", () => {
            instance.unmark();
            instance.mark(text.value);

        //    Для моб менюшки (скрою ее после нажатия)
            btn.closest(".header_links_js").classList.toggle("-active")
        })

    }
    search ()


});















