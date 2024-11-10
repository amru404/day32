// const SURVEY_ID = 1;

const surveyJson = {
    elements: [{
        name: "nama",
        title: "Masukan nama anda:",
        type: "text"
    }, {
        name: "performa",
        title: "Bagaimana Performa website ini:",
        type: "text"
    }, {
        name: "tampilan",
        title: "Bagaimana tampilan website ini:",
        type: "text"
    }, {
        name: "kemudahan",
        title: "Bagaimana kemudahan navigasi website ini:",
        type: "text"
    }, {
        name: "keamanan",
        title: "Bagaimana keamanan website ini:",
        type: "text"
    }
]
};

const survey = new Survey.Model(surveyJson);

function alertResults(sender) {
    const results = sender.data;
    console.log(results);

    saveSurveyResults('/survey/add', results);
}

survey.onComplete.add(alertResults);

document.addEventListener("DOMContentLoaded", function() {
    survey.render(document.getElementById("surveyContainer"));
});

function saveSurveyResults(url, data) {
    $.ajax({
        url:url,
        type: 'POST',
        data: JSON.stringify(data), 
        contentType: 'application/json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            console.log("Survey saved successfully:", response);
            // Lakukan sesuatu setelah berhasil
        },
        error: function(xhr, status, error) {
            console.error("Failed to save survey:", error);
            // Tangani error
        }
    });
}
