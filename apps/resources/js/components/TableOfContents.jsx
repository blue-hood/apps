import React from 'react';

export default () => {
  /*const headings = table.parentElement.querySelectorAll("h1, h2, h3, h4, h5, h6");
  const stack = [{ level: 0, element: table }];

  headings.forEach(heading => {
    const li = document.createElement("li");
    const a = document.createElement("a");
    const id = `section-${table_of_contents_counter++}`;
    const ol = document.createElement("ol");

    // 目次要素の生成
    a.textContent = heading.textContent;
    a.href = `#${id}`;
    li.appendChild(a);
    li.appendChild(ol);

    // リンク先の生成
    heading.id = id;
    heading.classList.add("anchor-link");

    // 階層構造の生成
    const level = Number(heading.tagName.substring(1));
    let parent;
    do {
      parent = stack.pop();
    } while (parent.level >= level);
    parent.element.appendChild(li);
    stack.push(parent);
    stack.push({ level: level, element: ol });
  });*/
  return (
    <div>
      <li>TEST</li>
    </div>
  )
};