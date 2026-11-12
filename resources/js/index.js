import { mountCadViewer } from 'cad-blueprint/viewer';

export default function cadViewerComponent({ state, options = {} }) {
    return {
        viewer: null,
        init() {
            const initialData = state || (this.$wire && options.statePath ? this.$wire.get(options.statePath) : null);
            if (initialData) {
                this.mount(initialData);
            }

            if (options.statePath && this.$wire) {
                this.$watch(`$wire.${options.statePath}`, (newState) => {
                    if (newState) {
                        if (this.viewer) {
                            this.viewer.setDocument(newState, { keepView: true });
                        } else {
                            this.mount(newState);
                        }
                    }
                });
            }
        },
        mount(data) {
            if (this.viewer) {
                this.viewer.destroy();
                this.viewer = null;
            }
            if (!this.$refs.canvas || !data) return;

            this.viewer = mountCadViewer(this.$refs.canvas, data, {
                toolbar: options.toolbar ?? true,
                background: options.background ?? 'transparent',
                paper: options.paper ?? '#ffffff',
                fitMargin: options.fitMargin ?? 16,
            });

            this.viewer.on((e) => {
                if (e.type === 'select' && e.id && this.$wire) {
                    this.$wire.dispatch('cad-object-selected', { id: e.id, layer: e.layer, point: e.point });
                }
            });
        },
        destroy() {
            if (this.viewer) {
                this.viewer.destroy();
                this.viewer = null;
            }
        },
    };
}

if (typeof window !== 'undefined') {
    window.cadViewerComponent = cadViewerComponent;
}
