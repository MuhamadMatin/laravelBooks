import "./bootstrap";
import {
    ClassicEditor,
    AccessibilityHelp,
    Alignment,
    Autoformat,
    Autosave,
    BlockQuote,
    Bold,
    Essentials,
    FindAndReplace,
    Heading,
    Indent,
    IndentBlock,
    Italic,
    Link,
    List,
    ListProperties,
    Paragraph,
    PasteFromOffice,
    SelectAll,
    Strikethrough,
    TextTransformation,
    TodoList,
    Underline,
    Undo,
} from "ckeditor5";

import "ckeditor5/ckeditor5.css";

import "../css/app.css";

let editorInstance;

const editorConfig = {
    toolbar: {
        items: [
            "undo",
            "redo",
            "|",
            "findAndReplace",
            "|",
            "heading",
            "|",
            "bold",
            "italic",
            "underline",
            "strikethrough",
            "|",
            "link",
            "blockQuote",
            "|",
            "alignment",
            "|",
            "bulletedList",
            "numberedList",
            "todoList",
            "outdent",
            "indent",
        ],
        shouldNotGroupWhenFull: false,
    },
    plugins: [
        AccessibilityHelp,
        Alignment,
        Autoformat,
        Autosave,
        BlockQuote,
        Bold,
        Essentials,
        FindAndReplace,
        Heading,
        Indent,
        IndentBlock,
        Italic,
        Link,
        List,
        ListProperties,
        Paragraph,
        PasteFromOffice,
        SelectAll,
        Strikethrough,
        TextTransformation,
        TodoList,
        Underline,
        Undo,
    ],
    heading: {
        options: [
            {
                model: "paragraph",
                title: "Paragraph",
                class: "ck-heading_paragraph",
            },
            {
                model: "heading1",
                view: "h1",
                title: "Heading 1",
                class: "ck-heading_heading1",
            },
            {
                model: "heading2",
                view: "h2",
                title: "Heading 2",
                class: "ck-heading_heading2",
            },
            {
                model: "heading3",
                view: "h3",
                title: "Heading 3",
                class: "ck-heading_heading3",
            },
            {
                model: "heading4",
                view: "h4",
                title: "Heading 4",
                class: "ck-heading_heading4",
            },
            {
                model: "heading5",
                view: "h5",
                title: "Heading 5",
                class: "ck-heading_heading5",
            },
            {
                model: "heading6",
                view: "h6",
                title: "Heading 6",
                class: "ck-heading_heading6",
            },
        ],
    },
    link: {
        addTargetToExternalLinks: true,
        defaultProtocol: "https://",
        decorators: {
            toggleDownloadable: {
                mode: "manual",
                label: "Downloadable",
                attributes: {
                    download: "file",
                },
            },
        },
    },
    list: {
        properties: {
            styles: true,
            startIndex: true,
            reversed: true,
        },
    },
    placeholder: "Type or paste your content here!",
};

document.addEventListener("livewire:navigated", () => {
    const editorElement = document.querySelector("#editor");
    if (editorElement) {
        ClassicEditor.create(editorElement, editorConfig);
    }
});
