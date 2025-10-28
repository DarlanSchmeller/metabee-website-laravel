export default function curriculumBuilder(initialModules = [], errors = {}) {
    return {
        modules: initialModules.length
            ? initialModules.map(module => ({
                title: module.title || '',
                lessons: module.lessons?.length ? module.lessons : [{ title: '', url: '', duration: '' }]
            }))
            : [{ title: '', lessons: [{ title: '', url: '', duration: '' }] }],

        errors,

        addModule() {
            this.modules.push({
                title: '',
                lessons: [{ title: '', url: '', duration: '' }]
            });
        },

        removeModule(index) {
            this.modules.splice(index, 1);
        },

        addLesson(module) {
            module.lessons.push({
                title: '',
                url: '',
                duration: ''
            });
        },

        removeLesson(module, lessonIndex) {
            module.lessons.splice(lessonIndex, 1);
        },

        getError(moduleIndex, field) {
            const key = `modules.${moduleIndex}.${field}`;
            return this.errors[key]?.[0] ?? null;
        },

        getLessonError(moduleIndex, lessonIndex, field) {
            const key = `modules.${moduleIndex}.lessons.${lessonIndex}.${field}`;
            return this.errors[key]?.[0] ?? null;
        },
    }
}
