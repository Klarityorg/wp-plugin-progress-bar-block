import './style.scss';
import './editor.scss';

const {__} = wp.i18n;
const {registerBlockType} = wp.blocks;

const el = wp.element.createElement;
const iconEl = el('svg', { width: 128, height: 128, viewBox: "0 0 128 128" },
	el('rect', { x: 0, y: 0, width: 128, height: 128, stroke: "white" }),
	el('path', { d: "M41.7607 39.0615H52.8432V60.866L73.2637 39.0615H86.6547L66.1434 60.2237L87.5885 88.9388H74.2753L58.66 67.706L52.8432 73.6982V88.9388H41.7607V39.0615Z", fill: "white" })
);

registerBlockType('klarity/klarity-progress-bar-block', {
	title: __('Progress bar'),
	icon: iconEl,
	category: 'layout',
	attributes: {
		progress: {
			type: 'string',
			default: '0'
		},
		progressColor: {
			type: 'string',
			default: '#49DB95'
		},
		backgroundColor: {
			type: 'string',
			default: '#E2E2E2'
		}
	},
	edit: props => {
		const {attributes: {progress, progressColor, backgroundColor}, setAttributes} = props;
		const setProgress = event => {
		  const selected = event.target;
		  setAttributes({progress: selected.value})
		  event.preventDefault();
		};
		const setProgressColor = event => {
		  const selected = event.target;
		  setAttributes({progressColor: selected.value})
		  event.preventDefault();
		};
		const setBackgroundColor = event => {
		  const selected = event.target;
		  setAttributes({backgroundColor: selected.value})
		  event.preventDefault();
		};
		return<div>
		<label htmlFor="progress-input">Progress:
			<input id="progress-input" type="number" value={progress} onChange={setProgress}/>
		</label>
		<label htmlFor="progress-color-input">Progress color:
			<input id="progress-color-input" type="string" value={progressColor} onChange={setProgressColor}/>
		</label>
		<label htmlFor="background-color-input">Background color:
			<input id="background-color-input" type="string" value={backgroundColor} onChange={setBackgroundColor}/>
		</label>
	</div>;
	},
	save: props => {
		return null;
	},
});
