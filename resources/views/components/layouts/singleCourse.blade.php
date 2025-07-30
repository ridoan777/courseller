<x-master>
   <h1 class="text-white text-3xl font-bold rounded">Create a course</h1>
   <!--  -->
   <div>
      <a href="{{ route('course') }}" class="text-blue-400 hover:text-blue-500">
         < back to Course Page
            </a>
   </div>

   <!--  -->
   <form action="{{ route('storeCourse') }}" method="POST" 
      class="p-8 my-8 bg-gray-700 rounded-lg">
      @csrf

      <div class="flex gap-8 text-gray-300">
         <div class="w-1/2">
            <label>Course Title</label>
            <input type="text" name="course_title" class="textInput">
         </div>
         <div class="w-1/2">
            <label>Featured Video</label>
            <input type="url" name="featured_video" class="textInput">
         </div>
      </div>
      <!--  -->
      <hr class="my-8 h-1 bg-gray-500 border-0">
      <!--  -->
      <div id="moduleContainer" class="my-8">
         <!-- Moduels will be appended here -->
      </div>
      <!--  -->
      <button type="button" onclick="addModule()" class="addButton">Add Module +</button>
      <br>
      <button type="submit" class="saveButton my-8">Save All</button>

   </form>

   <template id="moduleTemplate">
      <div class="moduleCreate accordion" data-index="__moduleIndex__">
         <div class="accordion-header flex justify-between items-center" onclick="togglePrimaryAccordion(this)">
            <h2>Module __moduleCounter__</h2>
            <button type="button" onclick="deleteContent(event, this, 'module')" class="deleteButton">X</button>
         </div>
         <div class="accordion_primary_body">

            <div class="my-4">
               <label>Module Title</label>
               <input type="text" name="modules[__moduleIndex__][title]" class="textInput">
            </div>

            <button type="button" onclick="addContent(this)" class="addButton my-4">Add Content +</button>

            <div class="contentContainer">
               <!-- Contents will be appended here -->
            </div>

         </div>
      </div>
   </template>

   <template id="contentTemplate">
      <div class="contentCreate accordion" data-index="__contentIndex__">
         <div class="accordion-header flex justify-between items-center" onclick="toggleSecondaryAccordion(this)">
            Content __contentCounter__
            <button type="button" onclick="deleteContent(event, this, 'content')" class="deleteButton">X</button>
         </div>
         <div class="accordion_secondary_body">

            <div class="my-4" data-index="__contentIndex__">
               <label>Content Title</label>
               <input type="text" name="modules[__moduleIndex__][content][__contentIndex__][title]" class="textInput">
            </div>
            <div class="my-4" data-index="__moduleIndex__">
               <label>Video Source Type</label>
               <input type="text" name="modules[__moduleIndex__][content][__contentIndex__][source]" class="textInput videoSourceType">
            </div>
            <div class="my-4" data-index="__moduleIndex__">
               <label>Video URL</label>
               <input type="url" name="modules[__moduleIndex__][content][__contentIndex__][url]" class="textInput">
            </div>
            <div class="my-4" data-index="__moduleIndex__">
               <label>Video Length</label>
               <input type="text" name="modules[__moduleIndex__][content][__contentIndex__][length]" class="textInput">
            </div>

         </div>
      </div>
   </template>

</x-master>

   <script data-label="addContetnScript">
      let moduleCount = 0;

      // add new module
      function addModule() {
         const moduleIndex = moduleCount++;
         const tuple = document.getElementById('moduleTemplate').innerHTML;
         const html = tuple
            .replace(/__moduleIndex__/g, moduleIndex)
            .replace(/__moduleCounter__/g, moduleIndex + 1);

         const container = document.createElement('div');
         container.innerHTML = html;
         document.getElementById('moduleContainer').appendChild(container);

         reindexModules();
      }

      // add new content
      function addContent(btn) {
         const moduleElement = btn.closest('.moduleCreate');
         const moduleIndex = moduleElement.getAttribute('data-index');
         const contentContainer = moduleElement.querySelector('.contentContainer');

         const contentIndex = contentContainer.children.length;
         const tuple = document.getElementById('contentTemplate').innerHTML;
         let html = tuple
            .replace(/__moduleIndex__/g, moduleIndex)
            .replace(/__contentIndex__/g, contentIndex)
            .replace(/__contentCounter__/g, contentIndex + 1);

         const container = document.createElement('div');
         container.innerHTML = html;
         contentContainer.appendChild(container);
      }
   </script>

   <script data-label="deleteScript">
      // delete content
      function deleteContent(event, buttonElement, flagValue) {
         event.stopPropagation();

         const flag = flagValue;
         console.log(flag);

         if (flag === 'module') {
            const moduleElement = buttonElement.closest('.moduleCreate');
            if (!moduleElement) {
               return;
            }

            const wrapperDiv = moduleElement.parentNode;

            if (wrapperDiv) {
               wrapperDiv.remove();
               reindexModules();
            }
         } else if (flag === 'content') {
            const contentElement = buttonElement.closest('.contentCreate');
            if (!contentElement) {
               return;
            }
            const moduleElement = buttonElement.closest('.moduleCreate');
            if (!moduleElement) return;

            const wrapperDiv = contentElement.parentNode;

            if (wrapperDiv) {
               wrapperDiv.remove();
               const moduleIndex = moduleElement.getAttribute('data-index');
               reindexContents(moduleElement, moduleIndex);
            }
         }

      }

      function reindexModules() {
         const modules = document.querySelectorAll('.moduleCreate');

         modules.forEach((moduleElement, index) => {
            moduleElement.setAttribute('data-index', index);

            const header = moduleElement.querySelector('.accordion-header h2');
            if (header) {
               header.textContent = `Module ${index + 1}`;
            }

            const inputs = moduleElement.querySelectorAll('input[name]');
            inputs.forEach(input => {
               input.name = input.name.replace(/modules\[\d+\]/, `modules[${index}]`);
            });

            reindexContents(moduleElement, index);
         });
      }

      function reindexContents(moduleElement, moduleIndex) {
         const contentItems = moduleElement.querySelectorAll('.contentCreate');
         contentItems.forEach((contentEl, contentIndex) => {
            contentEl.setAttribute('data-index', contentIndex);

            const header = contentEl.querySelector('.accordion-header');
            if (header) {
               const deleteButton = header.querySelector('button');
               header.innerHTML = `Content ${contentIndex + 1}`;
               if (deleteButton) {
                  header.appendChild(deleteButton);
               }
            }

            const inputs = contentEl.querySelectorAll('input[name]');
            inputs.forEach(input => {
               input.name = input.name
                  .replace(/modules\[\d+\]/, `modules[${moduleIndex}]`)
                  .replace(/\[content\]\[\d+\]/, `[content][${contentIndex}]`);
            });
         });
      }
   </script>

   <script data-label="accordionScript">
      function togglePrimaryAccordion(headerElement) {
         const bodyElement = $(headerElement).next('.accordion_primary_body');

         if (bodyElement.hasClass('active')) {
            bodyElement
               .slideUp(300, 'swing')
               .removeClass('active');
         } else {
            $('.accordion_primary_body.active')
               .slideUp(300, 'swing')
               .removeClass('active');

            bodyElement
               .slideDown(300, 'swing')
               .addClass('active');
         }
      }

      function toggleSecondaryAccordion(headerElement) {
         const bodyElement = $(headerElement).next('.accordion_secondary_body');

         if (bodyElement.hasClass('active')) {
            bodyElement
               .slideUp(300, 'swing')
               .removeClass('active');
            console.log("nested");
         } else {
            $('.accordion_secondary_body.active')
            // uncomment this to make multiple accordion items open at a time
            // .slideUp(300, 'swing')
            // .removeClass('active');

            bodyElement
               .slideDown(300, 'swing')
               .addClass('active');
         }
      }
   </script>

   <style>
      label{
         font-size: 16px;
         color: #d1d5dc;
      }

      input[type="text"], input[type="url"]{
         color: white;
         background-color: #1e2939;
      }

      .accordion-header {
         cursor: pointer;
         padding: 0.5em;
         color: #fff;
         background: #6a7282;
         border: none;
         border-radius: 8px 8px 0 0;
         transition: background 1s;
      }

      .accordion_primary_body,
      .accordion_secondary_body {
         display: none;
         padding: 1em;
         border-left: 1px solid #6a728280;
         border-right: 1px solid #6a728280;
         border-bottom: 1px solid #6a728280;
         background: #364153;
      }

      .accordion_primary_body.active,
      .accordion_secondary_body.active {
         display: block;
      }

      .accordion_secondary_body {
         overflow: hidden;
         padding: 1em;
         border-left: 2px solid #ccc;
         background: #364153;
         display: none;
      }
   </style>