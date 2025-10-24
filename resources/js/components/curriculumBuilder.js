export default function curriculumBuilder(initialModules = [], errors = {}) {
    return {
        modules: initialModules,
        errors,

        addModule() {
            this.modules.push({ module: '', lessons: 1, duration: '' });
        },
        removeModule(index) {
            this.modules.splice(index, 1);
        },
        getError(index, field) {
            const key = `modules.${index}.${field}`;
            return this.errors[key]?.[0] ?? null;
        }
    }
}
