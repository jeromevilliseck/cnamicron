set nocompatible " Annule la compatibilite avec l’ancetre Vi

" Activation de pathogen
call pathogen#infect()

set title "Met a jour le titre de votre fenetre ou de votre terminal
set number "Affiche le numero des lignes
set ruler "Affiche la position actuelle du curseur
set nowrap "Affiche les lignes trop longues sur une seul ligne
set scrolloff=3 "Affiche un minimum de 3 lignes autour du curseur
set ignorecase "Ignore la casse lors d’une recherche
set smartcase "Si une recherche contient une majuscule, reactive la sensibilite a la casse
set incsearch "Surligne les resultats de recherche pendant la saisie
set hlsearch "Surligne les resultats de recherche
set backspace=indent,eol,start "Active le comportement ’habituel’ de la touche retour en arriere
set hidden "Cache les fichiers lors de l’ouverture d’autres fichiers

" Active la coloration syntaxique
syntax enable
" Active les comportements specifiques aux types de fichiers comme
" la syntaxe et l’indentation
filetype on
filetype plugin on
filetype indent on

" Utilise la version sombre de Solarized
set background=dark
colorscheme solarized8

" Activation de NERDTree au lancement de vim
" autocmd vimenter * NERDTree

" Desactiver les touches directionnelles (sauf celle du bas pour le plugin neocomplete d'autocompletion)
map <up> <nop>
"map <down> <nop>
map <left> <nop>
map <right> <nop>
imap <up> <nop>
"imap <down> <nop>
imap <left> <nop>
imap <right> <nop>

" Appuyer deux fois sur ;; pour obtenir la meme action que sur la touche echap
:imap ;; <Esc>
:map ;; <Esc>

"raccourci de la touche leader
let mapleader = ","

"utilisation du plugin ack
" Parametres par defaut pour ack
let g:ackprg="ack -H --nocolor --nogroup --column"
" Place un marqueur et cherche
nmap <leader>j mA:Ack<space>
" Place un marqueur et cherche le mot sous le curseur
nmap <leader>ja mA:Ack "<C-r>=expand("<cword>")<cr>"
nmap <leader>jA mA:Ack "<C-r>=expand("<cWORD>")<cr>"

"utilisation du plugin ctrlp
let g:ctrlp_map = '<c-p>'

"utilisation du plugin neocomplete
let g:neocomplete#enable_at_startup = 1

"guide d'utilisation du plugin vim-surround https://github.com/tpope/vim-surround

"utilisation du plugin syntastic (gestion des erreurs) 
"montrer les erreurs -> taper la commande :SyntasticCheck
"fermer le panneau d'erreurs -> taper la commance :lclose
set statusline+=%#warningmsg#
set statusline+=%{SyntasticStatuslineFlag()}
set statusline+=%*

let g:syntastic_always_populate_loc_list = 1
let g:syntastic_auto_loc_list = 1
let g:syntastic_check_on_wq = 0
let g:syntastic_aggregate_errors = 1
let g:syntastic_enable_signs = 1
let g:syntastic_error_symbol = "\u2717"
let g:syntastic_warning_symbol = "\u26A0"
let g:syntastic_enable_highlighting = 1

"utilisation du plugin emmet d'autocompletion"
let g:user_emmet_mode='a'    "enable all function in all mode.

"utilisation du plugin tagbar"
nmap <F8> :TagbarToggle<CR>

"utilisation du plugin colorizer"
let g:colorizer_nomap = 1

"indentation automatique avec la touche F7"
map <F7> mzgg=G`z

"correction automatique en français avec la touche F9 anglais avec F10"
map <silent> <F10> "<Esc>:silent setlocal spell! spelllang=en<CR>"
map <silent> <F9> "<Esc>:silent setlocal spell! spelllang=fr<CR>"
cmap <c-ù> ]s
