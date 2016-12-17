window.onload = function () {
	ltube_toolbox_load_chart();
}

var divInTooltip = null;

function ltube_toolbox_load_chart() {
	ltube_chart = new cfx.Chart();
	ltube_chart.getAnimations().getLoad().setEnabled(true);
	
	ltube_chart.getAllSeries().getPointLabels().setVisible(true);
	ltube_chart.getView3D().setEnabled(true);
	
	var series = ltube_chart.getSeries().getItem(0);
	series.setGallery(cfx.Gallery.Pie);
	series.setVolume(100);


	//ltube_chart.setBackground(null);
	//ltube_chart.setBackColor("#0000FF");
	ltube_chart.create('LtubeToolboxPieChart');

	_ltube_populate_chart(ltube_chart);

    ltube_chart.getLegendBox().setContentLayout(cfx.ContentLayout.Center);
    ltube_chart.getLegendBox().setVisible(true);
	ltube_chart.getAllSeries().getPointLabels().setVisible(true);
	//var titles = ltube_chart.getTitles();
	//var title = new cfx.TitleDockable();
	//title.setText("Browser Usage in Africa on August 2013");
	//titles.add(title);	

	ltube_chart.on("gettip", onGetTip);

	ltube_chart.setGallery(cfx.Gallery.Pie);
}







function onGetTip(args) {
	slice_id = args.getPoint();

	var contentTemplate = '<DataTemplate>' +
	'<DockPanel Orientation="Vertical">' +
	'<DockPanel Orientation="Vertical" Margin="3,0,3,0">' +
	'<TextBlock Text="{Binding Path=Value}" FontWeight="Bold" HorizontalAlignment="Left"/>' +
	'</DockPanel>' +
	'<DockPanel Orientation="Vertical" Margin="3,10,3,0">' +
	'<TextBlock Text="'+slice_desc[slice_id]+'" Width="225" FontWeight="Bold" HorizontalAlignment="Left" />' +
	'</DockPanel>' +
	'</DockPanel>' +
	'</DataTemplate>';
    
	ltube_chart.getToolTips().setContentTemplate(contentTemplate);
}