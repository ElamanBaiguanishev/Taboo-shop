<div class="container">
    <div class="chair-background">
        <div class="contacts-form">
            <div>
                <h2>ЗАПИСАТЬСЯ</h2>
                <img src="assets/contacts-arrow.svg" alt="">
                <p>Мы рекомендуем записываться заранее, чтобы <br>гарантировать наилучшее обслуживание и удобное
                    время
                    для вас.</p>
            </div>
            <div class="contacts-form-send">
                <form action="process_booking.php" method="post">
                    <table>
                        <tr>
                            <td>
                                <input type="text" placeholder="Ваше Имя" name="name">
                            </td>
                            <td>
                                <select name="type_service" id="">
                                    <option value="">kek1</option>
                                    <option value="">kek2</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="phone_number" placeholder="НОМЕР ТЕЛЕФОНА">
                            </td>
                            <td>
                                <input type="date" name="date" placeholder="ВЫБЕРИТЕ ДАТУ">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><textarea name="comment" id="" rows="4"
                                    placeholder="Оставьте комментарий"></textarea></td>
                        </tr>
                    </table>

                    <button class="contacts-send-button">Записаться</button>
                </form>
            </div>
        </div>
    </div>
</div>