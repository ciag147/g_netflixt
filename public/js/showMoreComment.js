const timeAgo = (timestamp) => {
    const timezoneOffsetMilliseconds = 7 * 60 * 60 * 1000;
    const seconds = Math.floor(
        (new Date() - new Date(timestamp) - timezoneOffsetMilliseconds) / 1000
    );
    const intervals = {
        năm: 31536000,
        tháng: 2592000,
        tuần: 604800,
        ngày: 86400,
        giờ: 3600,
        phút: 60,
        giây: 1,
    };

    for (let key in intervals) {
        const interval = Math.floor(seconds / intervals[key]);
        if (interval >= 1) {
            return interval + " " + key + " trước";
        }
    }
    return "Vừa xong";
};
const loadingContainer = document.querySelector(".loading-container");
const showMoreBtn = document.querySelector(".showMoreBtn");
let page = 1;
showMoreBtn.onclick = () => {
    page++;
    loadingContainer.classList.remove("invisible");
    const href = document.querySelector(".href").value;
    fetch(`/api/video/commentList?v=${href}&page=${page}`, {
        method: "GET",
        headers: {
            "Content-Type": "application/json",
        },
    })
        .then((response) => response.json())
        .then((data) => {
            loadingContainer.classList.add("invisible");
            if (page >= data.last_page) {
                showMoreBtn.classList.add("invisible");
            }
            const html = data.data
                .map(
                    (item) => `
                <div class="anime__review__item">
                    <div class="anime__review__item__pic">
                        <img src="/img/default-avt.jpg" alt="avt" />
                    </div>
                    <div class="anime__review__item__text">
                        <h6>
                            ${item.fullname} - <span>${timeAgo(
                        item.createdAt
                    )}</span>
                        </h6>
                        <p>${item.content}</p>
                    </div>
                </div>
            `
                )
                .join("\n");
            const container = document.querySelector(".review-container");
            container.innerHTML += html;
        })
        .catch((error) => {
            console.error("Error:", error);
        });
};
