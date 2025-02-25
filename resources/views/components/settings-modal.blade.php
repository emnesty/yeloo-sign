<div
    x-show="isOpen"
    class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0">
    <div
        class="bg-white rounded-lg p-4 md:p-8 w-full max-w-4xl mx-auto max-h-[90vh] overflow-y-auto"
        @click.away="isOpen = false">
        <div class="flex justify-between items-center mb-4 md:mb-8">
            <h2 class="text-xl md:text-2xl font-semibold">Configurações de Animação</h2>
            <button @click="isOpen = false" class="text-gray-500 hover:text-gray-700">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-8">
            <!-- Coluna da Esquerda -->
            <div class="space-y-4 md:space-y-6">
                <!-- Texto de Exibição -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1 md:mb-2">
                        Texto de Exibição*
                    </label>
                    <input
                        type="text"
                        x-model="displayText"
                        class="w-full px-3 py-2 border rounded-md text-sm">
                </div>

                <!-- Tamanho da Fonte -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1 md:mb-2">
                        Tamanho da Fonte* (<span x-text="fontSize"></span>px)
                    </label>
                    <input
                        type="range"
                        x-model="fontSize"
                        min="50"
                        max="500"
                        class="w-full">
                    <div class="flex justify-between text-xs md:text-sm text-gray-500 mt-1">
                        <span>50px</span>
                        <span>500px</span>
                    </div>
                </div>

                <!-- Velocidade da Animação -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1 md:mb-2">
                        Velocidade da Animação* (<span x-text="animationSpeed"></span>s)
                    </label>
                    <input
                        type="range"
                        x-model="animationSpeed"
                        min="5"
                        max="60"
                        class="w-full">
                    <div class="flex justify-between text-xs md:text-sm text-gray-500 mt-1">
                        <span>Rápido</span>
                        <span>Lento</span>
                    </div>
                </div>
            </div>

            <!-- Coluna da Direita -->
            <div class="space-y-4 md:space-y-6">
                <!-- Estilo do Gradiente -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1 md:mb-2">
                        Estilo do Gradiente*
                    </label>
                    <div class="grid grid-cols-5 gap-2 md:gap-3">
                        <template x-for="gradient in gradients" :key="gradient">
                            <button
                                @click="setGradient(gradient)"
                                class="w-12 h-12 md:w-16 md:h-16 rounded-lg border-2 transition-all duration-200"
                                :class="currentGradient === gradient ? 'border-blue-500' : 'border-transparent'"
                                :style="{ background: gradient }"></button>
                        </template>
                    </div>
                </div>

                <!-- Cor de Fundo -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1 md:mb-2">
                        Cor de Fundo*
                    </label>
                    <div class="grid grid-cols-5 gap-2 md:gap-3">
                        <template x-for="color in backgroundColors" :key="color">
                            <button
                                @click="setBackgroundColor(color)"
                                class="w-12 h-12 md:w-16 md:h-16 rounded-lg border-2 transition-all duration-200"
                                :class="backgroundColor === color ? 'border-blue-500' : 'border-transparent'"
                                :style="{ backgroundColor: color }"></button>
                        </template>
                    </div>
                </div>
            </div>
        </div>

        <!-- Preview -->
        <div class="mt-4 md:mt-8">
            <label class="block text-sm font-medium text-gray-700 mb-1 md:mb-2">
                Pré-visualização
            </label>
            <div
                class="w-full h-16 md:h-20 rounded-lg overflow-hidden"
                :style="{ backgroundColor: backgroundColor }">
                <div class="h-full flex items-center justify-center">
                    <span
                        class="font-bold"
                        :style="{
                            fontSize: '24px',
                            background: currentGradient,
                            '-webkit-background-clip': 'text',
                            '-webkit-text-fill-color': 'transparent',
                            'background-size': '200% auto'
                        }">
                        Exemplo de texto
                    </span>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="mt-4 md:mt-8 flex justify-end space-x-3">
            <button
                @click="isOpen = false"
                class="px-4 py-2 md:px-6 md:py-2.5 text-gray-600 hover:text-gray-800 text-sm md:text-base font-medium">
                Cancelar
            </button>
            <button
                @click="saveChanges"
                class="px-4 py-2 md:px-6 md:py-2.5 bg-purple-600 text-white rounded-md hover:bg-purple-700 text-sm md:text-base font-medium">
                Salvar alterações
            </button>
        </div>
    </div>
</div>

<style>
    [type="range"] {
        -webkit-appearance: none;
        height: 6px;
        background: #e2e8f0;
        border-radius: 3px;
        outline: none;
    }

    [type="range"]::-webkit-slider-thumb {
        -webkit-appearance: none;
        width: 18px;
        height: 18px;
        background: #6366f1;
        border-radius: 50%;
        cursor: pointer;
        transition: background .15s ease-in-out;
    }

    [type="range"]::-webkit-slider-thumb:hover {
        background: #4f46e5;
    }
</style>
