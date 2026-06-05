document.addEventListener('DOMContentLoaded', () => {
  const checkboxes = Array.from(document.querySelectorAll('.js-subject-filter'));
  const groupItems = Array.from(document.querySelectorAll('.group-item'));
  const groupsCount = document.getElementById('groupsCount');

  if (!checkboxes.length || !groupItems.length) {
    return;
  }

  const normalize = (value) => value.trim().toLowerCase();

  const updateGroups = () => {
    const selectedSubjects = checkboxes
      .filter((checkbox) => checkbox.checked)
      .map((checkbox) => normalize(checkbox.value));

    let visibleCount = 0;

    groupItems.forEach((item) => {
      const itemSubject = normalize(item.dataset.subject || '');
      const shouldShow = selectedSubjects.length === 0 || selectedSubjects.includes(itemSubject);

      item.classList.toggle('d-none', !shouldShow);

      if (shouldShow) {
        visibleCount += 1;
      }
    });

    if (groupsCount) {
      groupsCount.textContent = `${visibleCount} gruppi trovati`;
    }
  };

  checkboxes.forEach((checkbox) => {
    checkbox.addEventListener('change', updateGroups);
  });

  updateGroups();
});
