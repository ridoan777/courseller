<x-master>
   <h1 class="text-3xl font-bold rounded">Create a course</h1>
   <!--  -->
   <div>
      <a href="{{ route('home') }}" class="text-blue-600 hover:text-blue-500">
         < back to Course Page
            </a>
   </div>
   <!--  -->
   <!-- <form action="{{ route('storeCourse') }}" method="POST" class="hidden">
      @csrf

      <div class="my-8 flex gap-8">
         <div class="w-1/2">
            <label>Course Title</label>
            <input type="text" name="course_title" class="textInput">
         </div>
         <div class="w-1/2">
            <label>Featured Video</label>
            <input type="url" name="featured_video" class="textInput">
         </div>
      </div>
      
      <div id="moduleContainer" class="my-8">
         // Moduels will be appended here 
      </div>
      
      <button type="button" onclick="addModule()" class="addButton">Add Module +</button>
      <br>
      <button type="submit" class="saveButton my-8">Save All</button>

   </form> -->

   <!--  -->
   <form action="{{ route('storeCourse') }}" method="POST">
      @csrf

      <div class="my-8 flex gap-8">
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
      <div id="moduleContainer" class="my-8">
         <!-- Moduels will be appended here -->
      </div>
      <!--  -->
      <button type="button" onclick="addModule()" class="addButton">Add Module +</button>
      <br>
      <button type="submit" class="saveButton my-8">Save All</button>

   </form>

   <!--  -->
   <template id="moduleTemplate-ORIGINAL">
      <div class="moduleCreate" data-index="__moduleIndex__">
         <h2 class="text-2xl">Module</h2>
         <div class="my-4">
            <label>Module Title</label>
            <input type="text" name="modules[__moduleIndex__][title]" class="textInput">
         </div>

         <div class="contentContainer">
            <!-- Contents will be appended here -->
         </div>

         <button type="button" onclick="addContent(this)" class="addButton">Add Content +</button>
         <hr>
      </div>
   </template>

   <!--  -->
   <template id="contentTemplate-ORIGINAL">
      <div class="content">
         <h2 class="contentTitle text-2xl">Content</h2>

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

   </template>


   <!--  -->
   <template id="demoAccordionFromCodepan">
      <div class="accordion">
         <dl>
            <h1>sfsafsaf</h1>
            <dt>Question 1</dt>
            <dd>
               <div class="accordion-nested">
                  <dl>
                     <dt>Sub-question 1.1</dt>
                     <dd>
                        content-1
                     </dd>
                     <dt>Sub-question 1.2</dt>
                     <dd>
                        content-2
                     </dd>
                  </dl>
               </div>
            </dd>
            <dt>Question 2</dt>
            <dd>
               <div class="accordion-nested">
                  <dl>
                     <dt>Sub-question 1.1</dt>
                     <dd>
                        content-1
                     </dd>
                     <dt>Sub-question 1.2</dt>
                     <dd>
                        content-2
                     </dd>
                  </dl>
               </div>
            </dd>
         </dl>
      </div>
   </template>


   <!--  -->
   <dl>
      <dt>Module 1</dt>
      <dd>
         <div class="accordion-nested">
            <dl>
               <dt>Content-1</dt>
               <dd>
                  content-1 details
               </dd>
               <dt>Content-1</dt>
               <dd>
                  content-2 details
               </dd>
            </dl>
         </div>
      </dd>
   </dl>

   <template id="moduleTemplate">
      <div class="moduleCreate accordion" data-index="__moduleIndex__">
         <div class="accordion-header flex justify-between items-center" onclick="togglePrimaryAccordion(this)">
            <h2>Module __moduleCounter__</h2>
            <button type="button" onclick="deleteContent(event, this)" class="deleteButton">X</button>
         </div>
         <div class="accordion_primary_body">
            <h2 class="text-2xl">Module</h2>

            <div class="my-4">
               <label>Module Title</label>
               <input type="text" name="modules[__moduleIndex__][title]" class="textInput">
            </div>

            <div class="contentContainer">
               <!-- Contents will be appended here -->
            </div>

            <button type="button" onclick="addContent(this)" class="addButton">Add Content +</button>
         </div>
      </div>
   </template>

   <template id="contentTemplate">
      <div class="contentCreate accordion" data-index="__contentIndex__">
         <div class="accordion-header" onclick="toggleSecondaryAccordion(this)">
            Content __contentCounter__
         </div>
         <div class="accordion_secondary_body">
            <h2 class="text-2xl">Content</h2>

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

   <script>
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

      // delete content
      function deleteContent(event, buttonElement) {
         event.stopPropagation();

         const moduleEl = buttonElement.closest('.moduleCreate');
         if(!moduleEl){
            return;
         }

         const wrapperDiv = moduleEl.parentNode;

         if (moduleEl) {
            moduleEl.remove();
            reindexModules();
         }
      }

      function reindexModules() {
         const modules = document.querySelectorAll('.moduleCreate');

         modules.forEach((moduleEl, index) => {
            moduleEl.setAttribute('data-index', index);

            // Update header
            const header = moduleEl.querySelector('.accordion-header h2');
            if (header) {
               header.textContent = `Module ${index + 1}`;
            }

            // Update input name attributes inside this module
            const inputs = moduleEl.querySelectorAll('input[name]');
            inputs.forEach(input => {
               input.name = input.name.replace(/modules\[\d+\]/, `modules[${index}]`);
            });

            // Update contents inside each module
            reindexContents(moduleEl, index);
         });
      }

      function reindexContents(moduleEl, moduleIndex) {
         const contentItems = moduleEl.querySelectorAll('.contentCreate');

         contentItems.forEach((contentEl, contentIndex) => {
            contentEl.setAttribute('data-index', contentIndex);

            // Update content heading
            const header = contentEl.querySelector('.accordion-header h2');
            if (header) {
               header.textContent = `Content ${contentIndex + 1}`;
            }

            // Update input names
            const inputs = contentEl.querySelectorAll('input[name]');
            inputs.forEach(input => {
               input.name = input.name
                  .replace(/modules\[\d+\]/, `modules[${moduleIndex}]`)
                  .replace(/\[content\]\[\d+\]/, `[content][${contentIndex}]`);
            });
         });
      }
   </script>

   <script>
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
      .accordion-header {
         cursor: pointer;
         padding: 0.5em;
         color: #fff;
         background: rgba(132, 109, 77, 1);
         border-bottom: 1px solid #fff;
         transition: background 1s;
      }

      .accordion_primary_body,
      .accordion_secondary_body {
         display: none;
         padding: 1em;
         border-left: 1px solid #ddd;
         border-right: 1px solid #ddd;
         border-bottom: 1px solid #ddd;
         background: #fafafa;
      }

      .accordion_primary_body.active,
      .accordion_secondary_body.active {
         display: block;
      }

      .accordion_secondary_body {
         overflow: hidden;
         padding: 1em;
         border-left: 2px solid #ccc;
         background: #f0f0f0;
         display: none;
      }
   </style>



</x-master>