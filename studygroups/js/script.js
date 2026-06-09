document.addEventListener('DOMContentLoaded', () => {
  const checkboxes = Array.from(document.querySelectorAll('.js-subject-filter'));
  const searchInput = document.getElementById('groupSearch');
  const groupItems = Array.from(document.querySelectorAll('.group-item'));
  const groupsCount = document.getElementById('groupsCount');
  const emptyState = document.getElementById('groupsEmptyState');

  if (!checkboxes.length && !searchInput) {
    return;
  }

  const normalize = (value) => value.trim().toLowerCase();

  const updateGroups = () => {
    const selectedSubjects = checkboxes
      .filter((checkbox) => checkbox.checked)
      .map((checkbox) => normalize(checkbox.value));

    const searchTerm = normalize(searchInput ? searchInput.value : '');
    let visibleCount = 0;

    groupItems.forEach((item) => {
      const itemSubject = normalize(item.dataset.subject || '');
      const itemName = normalize(item.dataset.name || '');
      const matchesSubject = selectedSubjects.length === 0 || selectedSubjects.includes(itemSubject);
      const matchesSearch = searchTerm === '' || itemName.includes(searchTerm);
      const shouldShow = matchesSubject && matchesSearch;

      item.classList.toggle('d-none', !shouldShow);

      if (shouldShow) {
        visibleCount += 1;
      }
    });

    if (emptyState) {
      emptyState.classList.toggle('d-none', visibleCount > 0);
    }

    if (groupsCount) {
      groupsCount.textContent = `${visibleCount} gruppi trovati`;
    }
  };

  checkboxes.forEach((checkbox) => {
    checkbox.addEventListener('change', updateGroups);
  });

  if (searchInput) {
    searchInput.addEventListener('input', updateGroups);
  }

  updateGroups();
});
