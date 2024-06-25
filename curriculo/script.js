document.addEventListener('DOMContentLoaded', function() {
    const educationFieldsContainer = document.getElementById('educationFields');
    const experienceFieldsContainer = document.getElementById('experienceFields');

    function addEducationField() {
        const educationField = document.createElement('div');
        educationField.className = 'educationField mb-3';

        educationField.innerHTML = `
            <input type="text" name="courses[]" class="form-control mb-2" placeholder="Curso" required>
            <input type="text" name="institutions[]" class="form-control mb-2" placeholder="Instituição" required>
            <input type="text" name="degrees[]" class="form-control mb-2" placeholder="Grau" required>
            <div class="button-container">
                <button type="button" class="btn btn-primary addEducation">+ Adicionar Educação</button>
                <button type="button" class="btn btn-danger removeEducation">- Remover Educação</button>
            </div>
        `;

        educationFieldsContainer.appendChild(educationField);
        updateEducationButtons();
    }

    function addExperienceField() {
        const experienceFieldCount = experienceFieldsContainer.getElementsByClassName('experienceField').length + 1;
        const experienceField = document.createElement('fieldset');
        experienceField.className = 'experienceField mb-3';

        experienceField.innerHTML = `
            <legend>Experiência Profissional ${experienceFieldCount}</legend>
            <div class="mb-3">
                <label for="position${experienceFieldCount}" class="form-label">Cargo:</label>
                <input type="text" id="position${experienceFieldCount}" name="position${experienceFieldCount}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="company${experienceFieldCount}" class="form-label">Empresa:</label>
                <input type="text" id="company${experienceFieldCount}" name="company${experienceFieldCount}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="from${experienceFieldCount}" class="form-label">De:</label>
                <input type="date" id="from${experienceFieldCount}" name="from${experienceFieldCount}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="to${experienceFieldCount}" class="form-label">Até:</label>
                <input type="date" id="to${experienceFieldCount}" name="to${experienceFieldCount}" class="form-control">
            </div>
            <div class="mb-3">
                <label for="description${experienceFieldCount}" class="form-label">Descrição:</label>
                <textarea id="description${experienceFieldCount}" name="description${experienceFieldCount}" class="form-control" rows="3" required></textarea>
            </div>
            <div class="button-container">
                <button type="button" class="btn btn-primary addExperience">+ Adicionar Experiência</button>
                <button type="button" class="btn btn-danger removeExperience">- Remover Experiência</button>
            </div>
        `;

        experienceFieldsContainer.appendChild(experienceField);
        updateExperienceButtons();
    }

    function removeEducationField(event) {
        if (educationFieldsContainer.getElementsByClassName('educationField').length > 1) {
            event.target.closest('.educationField').remove();
        }
        updateEducationButtons();
    }

    function removeExperienceField(event) {
        if (experienceFieldsContainer.getElementsByClassName('experienceField').length > 1) {
            event.target.closest('.experienceField').remove();
        }
        updateExperienceButtons();
    }

    function updateEducationButtons() {
        const educationFields = educationFieldsContainer.getElementsByClassName('educationField');
        for (let i = 0; i < educationFields.length; i++) {
            const addBtn = educationFields[i].querySelector('.addEducation');
            const removeBtn = educationFields[i].querySelector('.removeEducation');
            addBtn.style.display = i === educationFields.length - 1 ? 'inline-block' : 'none';
            removeBtn.style.display = educationFields.length > 1 ? 'inline-block' : 'none';
        }
    }

    function updateExperienceButtons() {
        const experienceFields = experienceFieldsContainer.getElementsByClassName('experienceField');
        for (let i = 0; i < experienceFields.length; i++) {
            const addBtn = experienceFields[i].querySelector('.addExperience');
            const removeBtn = experienceFields[i].querySelector('.removeExperience');
            addBtn.style.display = i === experienceFields.length - 1 ? 'inline-block' : 'none';
            removeBtn.style.display = experienceFields.length > 1 ? 'inline-block' : 'none';
        }
    }

    document.body.addEventListener('click', function(event) {
        if (event.target.classList.contains('addEducation')) {
            addEducationField();
        } else if (event.target.classList.contains('removeEducation')) {
            removeEducationField(event);
        } else if (event.target.classList.contains('addExperience')) {
            addExperienceField();
        } else if (event.target.classList.contains('removeExperience')) {
            removeExperienceField(event);
        }
    });

    updateEducationButtons();
    updateExperienceButtons();
});
