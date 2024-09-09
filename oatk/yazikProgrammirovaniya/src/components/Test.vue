<script>
export default {
    data() {
        return {
            step1: true,
            step2: false,
            step3: false,
            step4: false,
            step5: false,
            step6: false,
            fio: "",
            group: "",
            oneLang: "",
            twoLang: "",
            threeLang: "",
            isFioError: false,
            isGroupError: false,
            isOneLangError: false,
            isTwoLangError: false,
            isThreeLangError: false,
        }
    },
    methods: {
        submitForm() {
            if (!this.fio) {
                this.isFioError = true;
                return;
            }
            this.isFioError = false;
            if (!this.group) {
                this.isGroupError = true;
                return;
            }
            this.isGroupError = false;
            this.step1 = false;
            this.step2 = true;
        },
        prev1() {
            this.step1 = true;
            this.step2 = false;
        },
        prev2() {
            this.step2 = true;
            this.step3 = false;
        },
        prev3() {
            this.step3 = true;
            this.step4 = false;
        },
        prev4() {
            this.step4 = true;
            this.step5 = false;
        },
        next1() {
            if (!this.oneLang) {
                this.isOneLangError = true;
                return;
            }
            this.isOneLangError = false;
            this.step3 = true;
            this.step2 = false;
        },
        next2() {
            if (!this.twoLang) {
                this.isTwoLangError = true;
                return;
            }
            this.isTwoLangError = false;
            this.step4 = true;
            this.step3 = false;
        },
        next3() {
            if (!this.threeLang) {
                this.isThreeLangError = true;
                return;
            }
            this.isThreeLangError = false;
            this.step5 = true;
            this.step4 = false;
        },
        next4() {
            this.step6 = true;
            this.step5 = false;
            this.sendMail();
        },
        async sendMail() {
            try {
                const response = await fetch("https://gki-info.ru/api", {
                    method: 'POST',
                    credentials: 'include',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        key: "WK255",
                        service: "gki-wbk",
                        method: "sendMailTest",
                        data: {
                            fio: this.fio,
                            group: this.group,
                            oneLang: this.oneLang,
                            twoLang: this.twoLang,
                            threeLang: this.threeLang
                        }
                    })
                });

                if (!response.ok) throw new Error(`Ошибка сети: ${response.statusText}`);
            } catch (error) {
                console.error('Ошибка:', error);
            }
        }
    },
}
</script>

<template>
    <main class="test">
        <form @submit.prevent="submitForm" v-if="step1">
            <h1>Угадай Язык программирования</h1>
            <div>
                <label>
                    <span>ФИО</span>
                    <input type="text" v-model="fio">
                    <div class="is-error" v-if="isFioError">Поле обязательно для заполнения</div>
                </label>
                <label>
                    <span>Группа</span>
                    <input type="text" v-model="group">
                    <div class="is-error" v-if="isGroupError">Поле обязательно для заполнения</div>
                </label>
                <button type="submit">Начать</button>
            </div>
        </form>
        <div class="test" v-if="step2">
            <h2>Угадай Язык программирования</h2>
            <div class="task">
                <div class="img" @contextmenu.prevent>
                    <img src="/files/images/task/1.png" @dragstart.prevent alt="">
                    <div class="mask"></div>
                </div>
                <div>
                    <label>
                        <span>Язык Программирования</span>
                        <input type="text" v-model="oneLang">
                        <div class="is-error" v-if="isOneLangError">Поле обязательно для заполнения</div>
                    </label>
                </div>

                <div class="buttons">
                    <button type="button" class="is-prev" @click="prev1">Назад</button>
                    <button type="button" @click="next1">Далее</button>
                </div>
            </div>
        </div>
        <div class="test" v-if="step3">
            <h2>Угадай Язык программирования</h2>
            <div class="task">
                <div class="img" @contextmenu.prevent>
                    <img src="/files/images/task/2.png" @dragstart.prevent alt="">
                    <div class="mask"></div>
                </div>
                <div>
                    <label>
                        <span>Язык Программирования</span>
                        <input type="text" v-model="twoLang">
                        <div class="is-error" v-if="isTwoLangError">Поле обязательно для заполнения</div>
                    </label>
                </div>
                <div class="buttons">
                    <button type="button" class="is-prev" @click="prev2">Назад</button>
                    <button type="button" @click="next2">Далее</button>
                </div>
            </div>
        </div>
        <div class="test" v-if="step4">
            <h2>Угадай Язык программирования</h2>
            <div class="task">
                <div class="img" @contextmenu.prevent>
                    <img src="/files/images/task/3.png" @dragstart.prevent alt="">
                    <div class="mask"></div>
                </div>
                <div>
                    <label>
                        <span>Язык Программирования</span>
                        <input type="text" v-model="threeLang">
                        <div class="is-error" v-if="isThreeLangError">Поле обязательно для заполнения</div>
                    </label>
                </div>
                <div class="buttons">
                    <button type="button" class="is-prev" @click="prev3">Назад</button>
                    <button type="button" @click="next3">Далее</button>
                </div>
            </div>
        </div>
        <div class="test" v-if="step5">
            <div class="task">
                <div>
                    <p class="is-centered">Задания кончились. Уверены, что хотите отправить на проверку?</p>
                    <p class="is-centered">Данное действие нельзя отменить.</p>
                </div>
                <div class="buttons">
                    <button type="button" class="is-prev" @click="prev4">Назад</button>
                    <button type="button" @click="next4">Завершить</button>
                </div>
            </div>
        </div>
        <div class="test" v-if="step6">
            <div class="task">
                <div class="img is-success" @contextmenu.prevent>
                    <img src="/files/images/task/4.png" @dragstart.prevent alt="">
                    <div class="mask"></div>
                </div>
                <div>
                    <p class="is-centered">Ответы успешно отправлены на проверку</p>
                </div>
            </div>
        </div>
    </main>
</template>

<style></style>