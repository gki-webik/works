<template>
    <div class="content">
        <div class="main_content">
            <main class="statusPage" wk-mg="50px 0 0 0">
                <div class="statusPage__box">
                    <div class="statusPage__img">
                        <i class='bx bx-error'></i>
                    </div>
                    <div class="statusPage__content">
                        <div class="statusPage__title">{{ code }}</div>
                        <div class="statusPage__text">
                            {{ text }}
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            text: "Ошибка",
            code: "404"
        }
    },
    mounted() {
        this.setPageMeta();

        if (this.$route.params.type) {
            switch (this.$route.params.type) {
                case "1":
                    this.text = "Страница не найдена";
                    break;
                case "2":
                    this.text = "При выполнении данного действия произошла ошибка";
                    break;
                case "3":
                    this.text = "Возникла ошибка. Пожалуйста, обратитесь в Отдел Поддержки.";
                    break;
                case "4":
                    this.text = "Данного пользователя не существует";
                    break;
            }
        }
    },
    methods: {
        setPageMeta() {
            const title = 'Ошибка';
            document.title = title;

            const descriptionContent = `${title} | WK Profile`;
            this.setMetaTag('og:description', descriptionContent);
            this.setMetaTag('description', descriptionContent);
        },
        setMetaTag(name, content) {
            let metaTag = document.querySelector(`meta[name="${name}"]`) || document.createElement('meta');
            metaTag.setAttribute('name', name);
            metaTag.setAttribute('content', content);
            document.head.appendChild(metaTag);
        },
    }
}
</script>